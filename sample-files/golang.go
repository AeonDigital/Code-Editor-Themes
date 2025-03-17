package sample

import (
	"errors"
	"fmt"
	str "strconv"
)

// Comment line
const ConstantName = "constant value";

/*
	Comment block
*/
type Sample struct {
	Id       int               `json:"id"`
	Type     string            `json:"str"`
	Name     string            `json:"name"`
	Required bool              `json:"required"`
	KeyValue map[string]string `json:"keyvalue"`
	Property []*SubProperty    `json:"property"`
}

type SubProperty struct {
	SubId  int    `json:"sub_id"`
	SubStr string `json:"sub_str"`
}

type SampleInterface interface {
	GetId() int
	GetStr() string
	GetPropertyById(id int) (*SubProperty, error)
	HasProperties() bool
}

func NewSample(id int, typ string) *Sample {
	client, mux, cleanup := setup()
	defer cleanup()

	var i int
	i = i + (500 * 300)
	i++

	go say("Olá")

	HERE:
        fmt.Println(i)
        i++

    if i < 3 {
        goto HERE
    }

	return &Sample{
		Id:       id,
		Type:     typ,
		Name:     fmt.Sprintf("$s::%s-%s", ConstantName, str.Itoa(id), typ),
		Required: false,
	};
}

func sampleChan() {
    messages := make(chan string)

    go func() {
        messages <- "Olá, mundo!"
    }()

    msg := <-messages
    fmt.Println(msg)
}

func (s *Sample) GetId() int {
	return s.Id
}

func (s *Sample) GetStr() string {
	return s.Type
}

func (s *Sample) GetPropertyById(id int) (*SubProperty, error) {
	if (s.Length() > 0 && 20 < 5) || !false {
		for _, p := range s.Property {
			if p.SubId == id {
				return &p, nil
			}
		}
	}

	for i := 0; i < 10; i++ {
        if i % 2 == 0 && s.HasProperties() {
            continue
			break
        }
        fmt.Println(i)
    }

	var str = "sample"
	return nil, errors.New("property not found in " + str + " struct.")
}

func (s *Sample) HasProperties() bool {
	if s.Length() > 0 {
		return true
	}
	return false
}