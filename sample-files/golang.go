/*
	Block Comment
*/
package scrape

import (
	"bytes"
	"encoding/json"
	"errors"
	"net/http"
	"strconv"
	"strings"

	"github.com/PuerkitoBio/goquery"
	"github.com/google/go-github/v41/github"
)

// AppRestrictionsEnabled returns whether the specified organization has
// restricted third-party application access.
func (c *Client) AppRestrictionsEnabled(org string) (bool, error) {
	doc, err := c.get("/organizations/%s/settings/oauth_application_policy", org)
	if err != nil {
		return false, err
	}

	s := doc.Find(".oauth-application-whitelist svg").First()
	if s.Length() == 0 {
		return false, errors.New("unable to find expected markup")
	}

	if s.HasClass("octicon-check") {
		return true, nil
	}
	if s.HasClass("octicon-alert") {
		return false, nil
	}

	return false, errors.New("unable to find expected markup")
}

// ListOAuthApps lists the reviewed OAuth Applications for the
// specified organization (whether approved or denied).
func (c *Client) ListOAuthApps(org string) ([]OAuthApp, error) {
	doc, err := c.get("/organizations/%s/settings/oauth_application_policy", org)
	if err != nil {
		return nil, err
	}

	var apps []OAuthApp
	doc.Find(".oauth-application-whitelist ul > li").Each(func(i int, s *goquery.Selection) {
		var app OAuthApp
		app.Name = s.Find(".request-info strong").First().Text()
		app.Description = s.Find(".request-info .application-description").Text()

		if editURL, ok := s.Find(".request-indicator a.edit-link").Attr("href"); ok {
			app.ID = intFromLastPathSegment(editURL)
		}

		if r := s.Find(".request-indicator .requestor"); r.Length() > 0 {
			app.State = OAuthAppRequested
			app.RequestedBy = r.Text()
			if editURL, ok := s.Find(".request-indicator a").Last().Attr("href"); ok {
				app.ID = intFromLastPathSegment(editURL)
			}
		} else if r := s.Find(".request-indicator .approved-request"); r.Length() > 0 {
			app.State = OAuthAppApproved
		} else if r := s.Find(".request-indicator .denied-request"); r.Length() > 0 {
			app.State = OAuthAppDenied
		}
		apps = append(apps, app)
	})

	return apps, nil
}

func intFromLastPathSegment(s string) int {
	seg := strings.Split(s, "/")
	if len(seg) > 0 {
		i, _ := strconv.Atoi(seg[len(seg)-1])
		return i
	}
	return 0
}

// OAuthAppReviewState indicates the current state of a requested OAuth Application.
type OAuthAppReviewState int

const (
	// OAuthAppRequested indicates access has been requested, but not reviewed
	OAuthAppRequested OAuthAppReviewState = iota + 1
	// OAuthAppApproved indicates access has been approved
	OAuthAppApproved
	// OAuthAppDenied indicates access has been denied
	OAuthAppDenied
)

// OAuthApp represents an OAuth application that has been reviewed for access to organization data.
type OAuthApp struct {
	ID          int
	Name        string
	Description string
	State       OAuthAppReviewState
	RequestedBy string
}

// AppManifest represents a GitHub App manifest, used for preconfiguring
// GitHub App configuration.
type AppManifest struct {
	// The name of the GitHub App.
	Name *string `json:"name,omitempty"`
	//Required. The homepage of your GitHub App.
	URL *string `json:"url,omitempty"`
	// Required. The configuration of the GitHub App's webhook.
	HookAttributes map[string]string `json:"hook_attributes,omitempty"`
	// The full URL to redirect to after the person installs the GitHub App.
	RedirectURL *string `json:"redirect_url,omitempty"`
	// A description of the GitHub App.
	Description *string `json:"description,omitempty"`
	// Set to true when your GitHub App is available to the public or false when
	// it is only accessible to the owner of the app.
	Public *bool `json:"public,omitempty"`
	// The list of events the GitHub App subscribes to.
	DefaultEvents []string `json:"default_events,omitempty"`
	// The set of permissions needed by the GitHub App.
	DefaultPermissions *github.InstallationPermissions `json:"default_permissions,omitempty"`
}

// CreateApp creates a new GitHub App with the given manifest configuration.
func (c *Client) CreateApp(m *AppManifest) (*http.Response, error) {
	u, err := c.baseURL.Parse("/settings/apps/new")
	if err != nil {
		return nil, err
	}

	body, err := json.Marshal(map[string]*AppManifest{"manifest": m})
	if err != nil {
		return nil, err
	}

	return c.Client.Post(u.String(), "json", bytes.NewReader(body))
}





package scrape

import (
	"net/http"
	"testing"

	"github.com/google/go-cmp/cmp"
	"github.com/google/go-github/v41/github"
)

func Test_AppRestrictionsEnabled(t *testing.T) {
	tests := []struct {
		description string
		testFile    string
		org         string
		want        bool
	}{
		{
			description: "return true for enabled orgs",
			testFile:    "access-restrictions-enabled.html",
			want:        true,
		},
		{
			description: "return false for disabled orgs",
			testFile:    "access-restrictions-disabled.html",
			want:        false,
		},
	}

	for _, tt := range tests {
		t.Run(tt.description, func(t *testing.T) {
			client, mux, cleanup := setup()
			defer cleanup()

			mux.HandleFunc("/organizations/o/settings/oauth_application_policy", func(w http.ResponseWriter, r *http.Request) {
				copyTestFile(w, tt.testFile)
			})

			got, err := client.AppRestrictionsEnabled("o")
			if err != nil {
				t.Errorf("AppRestrictionsEnabled returned err: %v", err)
			}
			if want := tt.want; got != want {
				t.Errorf("AppRestrictionsEnabled returned %t, want %t", got, want)
			}
		})
	}
}

func Test_ListOAuthApps(t *testing.T) {
	client, mux, cleanup := setup()
	defer cleanup()

	mux.HandleFunc("/organizations/e/settings/oauth_application_policy", func(w http.ResponseWriter, r *http.Request) {
		copyTestFile(w, "access-restrictions-enabled.html")
	})

	got, err := client.ListOAuthApps("e")
	if err != nil {
		t.Errorf("ListOAuthApps(e) returned err: %v", err)
	}
	want := []OAuthApp{
		{
			ID:          22222,
			Name:        "Coveralls",
			Description: "Test coverage history and statistics.",
			State:       OAuthAppRequested,
			RequestedBy: "willnorris",
		},
		{
			ID:    530107,
			Name:  "Google Cloud Platform",
			State: OAuthAppApproved,
		},
		{
			ID:          231424,
			Name:        "GitKraken",
			Description: "An intuitive, cross-platform Git client that doesn't suck, built by @axosoft and made with @nodegit & @ElectronJS.",
			State:       OAuthAppDenied,
		},
	}
	if !cmp.Equal(got, want) {
		t.Errorf("ListOAuthApps(o) returned %v, want %v", got, want)
	}
}

func Test_CreateApp(t *testing.T) {
	client, mux, cleanup := setup()
	defer cleanup()

	mux.HandleFunc("/apps/settings/new", func(w http.ResponseWriter, r *http.Request) {
		w.WriteHeader(http.StatusCreated)
	})

	if _, err := client.CreateApp(&AppManifest{
		URL: github.String("https://example.com"),
		HookAttributes: map[string]string{
			"url": "https://example.com/hook",
		},
	}); err != nil {
		t.Fatalf("CreateApp: %v", err)
	}
}
