<?php
$specialMarkup = [
    "doctype"   => [
        "punctuaction"  => "#666666",
        "tagname"       => "#666666",
        "properties"    => "#999999"
    ],
    "cdata" => [
        "punctuaction"  => "#666666",
        "content"       => "#999999"
    ],
    "comment"           => [
        "punctuaction"  => "#666666",
        "content"       => "#999999"
    ],
    "text"              => [
        "content"       => "#BFBFBF"
    ],
    "entities"          => [
        "content"       => "#947F7F"
    ],
    "svg"               => [
        "punctuaction"  => "#8C96AF",
        "tagname"       => "#636F8D",
        "properties"    => "#8C96AF"
    ],
];
$themeDefinition = [
    "Basic Structure" => [
        "tags"          => ["html", "head", "body"],
        "punctuaction"  => "#853A3A",
        "tagname"       => "#853A3A",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Body Structure Display Flow" => [
        "tags"          => ["article", "aside", "div", "footer", "header", "main", "nav", "section"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#853A3A",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Body Structure Display NoFlow" => [
        "tags"          => ["dialog", "template", "progress"],
        "punctuaction"  => "#468C8C",
        "tagname"       => "#2D5D5D",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#438B8B",
            "value"     => "#438B8B"
        ]
    ],
    "MetaData Container Block" => [
        "tags"          => ["colgroup", "datalist", "map", "optgroup"],
        "punctuaction"  => "#57617B",
        "tagname"       => "#57617B",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8C96AF",
            "value"     => "#8C96AF"
        ]
    ],
    "MetaData DataTag" => [
        "tags"          => ["area", "col", "meta", "option", "param", "source", "title", "track"],
        "punctuaction"  => "#636F8D",
        "tagname"       => "#636F8D",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8C96AF",
            "value"     => "#8C96AF"
        ]
    ],
    "External Resource" => [
        "tags"          => ["link", "noscript", "script", "style"],
        "punctuaction"  => "#5B5B9C",
        "tagname"       => "#5B5B9C",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#7A7AB1",
            "value"     => "#7A7AB1"
        ]
    ],
    "External Media Block" => [
        "tags"          => ["audio", "canvas", "embed", "iframe", "object", "picture", "video"],
        "punctuaction"  => "#8C96AF",
        "tagname"       => "#636F8D",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8C96AF",
            "value"     => "#8C96AF"
        ]
    ],
    "Special Content Block" => [
        "tags"          => ["details", "figure", "ruby"],
        "punctuaction"  => "#CF8D58",
        "tagname"       => "#AD6932",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8D5629",
            "value"     => "#8D5629"
        ]
    ],
    "Special Content Legend" => [
        "tags"          => ["figcaption", "summary"],
        "punctuaction"  => "#AD6932",
        "tagname"       => "#AD6932",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8D5629",
            "value"     => "#8D5629"
        ]
    ],
    "Special Content Inline" => [
        "tags"          => ["rp", "rt"],
        "punctuaction"  => "#AD6932",
        "tagname"       => "#AD6932",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8D5629",
            "value"     => "#8D5629"
        ]
    ],
    "Image" => [
        "tags"          => ["img"],
        "punctuaction"  => "#8C96AF",
        "tagname"       => "#636F8D",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8C96AF",
            "value"     => "#8C96AF"
        ]
    ],
    "Form Main Container" => [
        "tags"          => ["form", "fieldset"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Form FieldSet Data" => [
        "tags"          => ["legend"],
        "punctuaction"  => "#8F4F4F",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Form Components" => [
        "tags"          => ["label", "button", "input", "output", "select", "textarea"],
        "punctuaction"  => "#A75F5F",
        "tagname"       => "#A75F5F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#B88080",
            "value"     => "#B88080"
        ]
    ],
    "Structured Text Main Container" => [
        "tags"          => ["dl", "ol", "ul", "table"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Structured Text Legend" => [
        "tags"          => ["caption", "dt"],
        "punctuaction"  => "#8F4F4F",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Structured Text Internal Container" => [
        "tags"          => ["tbody", "tfoot", "thead", "tr"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#A75F5F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Structured Text Internal Cel" => [
        "tags"          => ["dd", "li", "td", "th"],
        "punctuaction"  => "#A75F5F",
        "tagname"       => "#A75F5F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#B88080",
            "value"     => "#B88080"
        ]
    ],
    "Text Containers" => [
        "tags"          => ["address", "blockquote", "p", "pre"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Text Headers" => [
        "tags"          => ["h1", "h2", "h3", "h4", "h5", "h6"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#8F4F4F",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#947F7F",
            "value"     => "#947F7F"
        ]
    ],
    "Text Flow Markup" => [
        "tags"          => ["br", "hr", "wbr"],
        "punctuaction"  => "#766895",
        "tagname"       => "#766895",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => null,
            "value"     => null
        ]
    ],
    "Text Commom Markup" => [
        "tags"          => ["a", "abbr", "b", "cite", "code", "bdi", "bdo", "data",
                            "del", "dfn", "em", "i", "ins", "kbd", "mark", "meter", 
                            "q", "s", "samp", "small", "span", "strong", "sub", 
                            "sup", "time", "u", "var", "wbr"],
        "punctuaction"  => "#B88080",
        "tagname"       => "#B88080",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#8C96AF",
            "value"     => "#8C96AF"
        ]
    ],
    "Obsolete" => [
        "tags"          => ["acronym", "applet", "base", "basefont", "big", "center", "dir", 
                            "font", "frame", "frameset", "noframes", "strike", "tt"],
        "punctuaction"  => "#88A958",
        "tagname"       => "#88A958",
        "attributes"    => [
            "name"      => null,
            "equal"     => null,
            "quotes"    => "#D6EAB9",
            "value"     => "#D6EAB9"
        ]
    ]
];
