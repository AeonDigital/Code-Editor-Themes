<?php
include("htmlTagList.php");
include("themeDefinition.php");

$thisDir = __DIR__;
$newMarkup = $thisDir . "/markup.xml";

if (file_exists($newMarkup) === true) {
    unlink($newMarkup);
}

// > php ./autogenerate/html/create.php






/**
 * Gera a marcação para os escopos especials usados no HTML.
 *
 * @param       string $baseDir
 *              Caminho completo até o diretório base.
 * 
 * @param       array $sm
 *              Regras para a criação das entradas XML.
 * 
 * @return      string
 */
function generateThemeSpecialScopes(string $baseDir, array $sm) : string
{
    $str = "";

    foreach ($sm as $name => $rules) {
        $model = file_get_contents($baseDir . "/scopeModel-$name.txt");
        foreach ($rules as $k => $color) {
            $model = str_replace("[[$k]]", $color, $model);
        }
        $str .= $model;
    }

    return $str;
}





/**
 * Gera uma entrada XML para configurar um escopo para a linguagem HTML
 * em um tema do visual studio.
 *
 * @param       string $groupName
 *              Nome que o grupo de escopos definidos possui.
 * 
 * @param       string $specification
 *              Especificação do tipo de escopo. Os seguintes valores são
 *              aceitos:
 *              "punctuaction"  => refere-se aos caracteres "<" e ">" de uma tag.
 *              "tagname"       => refere-se ao próprio nome da tag.
 *              "attrName"      => nome dos atributos das tags de escopos especificados.
 *              "attrEqual      => simbolo de "=" da definição de um atributo.
 *              "attrQuotes"    => aspas duplas que encapsulam um valor de um atributo.
 *              "attrValue"     => valor do atributo.
 * 
 * @param       array $scopes
 *              Coleção de escopos que serão cobertos por esta regra e receberão
 *              a configuração de cor especificada.
 *              Deve ser um array associativo conforme o modelo:
 *              $scopes = [
 *                  "tagName"   => ["scope", isEmpty]
 *              ];
 * 
 *              ex:
 *              $scopes = [
 *                  "a"     => ["meta.tag.inline.a", false],
 *                  "br"    => ["meta.tag.inline.br", true],
 *              ]
 * 
 * @param       string $color
 *              A cor que será aplicada aos escopos definidos nesta regra.
 * 
 * @return      string
 */
function generateThemeForXMLMarkup(
    string $groupName, 
    string $specification,
    array $scopes, 
    string $color
) : string {

    $useScopes = [];
    foreach ($scopes as $tag => $rules) {
        $scope = $rules[0];
        $empty = $rules[1];

        switch ($specification) {
            case "punctuaction":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html punctuation.definition.tag.begin.html";
                    $useScopes[] = "        " . $scope . ".void.html punctuation.definition.tag.end.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html punctuation.definition.tag.begin.html";
                    $useScopes[] = "        " . $scope . ".start.html punctuation.definition.tag.end.html";
                    $useScopes[] = "        " . $scope . ".end.html punctuation.definition.tag.begin.html";
                    $useScopes[] = "        " . $scope . ".end.html punctuation.definition.tag.end.html";
                }
                break;

            case "tagname":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html entity.name.tag.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html entity.name.tag.html";
                    $useScopes[] = "        " . $scope . ".end.html entity.name.tag.html";
                }
                break;

            case "attrName":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html entity.other.attribute-name.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html entity.other.attribute-name.html";
                }
                break;

            case "attrEqual":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html punctuation.separator.key-value.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html punctuation.separator.key-value.html";
                }
                break;

            case "attrQuotes":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html punctuation.definition.string.begin.html";
                    $useScopes[] = "        " . $scope . ".void.html punctuation.definition.string.end.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html punctuation.definition.string.begin.html";
                    $useScopes[] = "        " . $scope . ".start.html punctuation.definition.string.end.html";
                }
                break;

            case "attrValue":
                if ($empty === true) {
                    $useScopes[] = "        " . $scope . ".void.html string.quoted.double.html";
                } else {
                    $useScopes[] = "        " . $scope . ".start.html string.quoted.double.html";
                }
                break;
        }
    }
    $useScopes = implode(",\n", $useScopes);


    $groupTitle = "";
    switch ($specification) {
        case "punctuaction":
            $groupTitle = "HTML $groupName | Open/Close Punctuaction";
            break;

        case "tagname":
            $groupTitle = "HTML $groupName | TagName";
            break;

        case "attrName":
            $groupTitle = "HTML $groupName | Attribute Name";
            break;

        case "attrEqual":
            $groupTitle = "HTML $groupName | Attribute Equal";
            break;

        case "attrQuotes":
            $groupTitle = "HTML $groupName | Attribute Quotes";
            break;

        case "attrValue":
            $groupTitle = "HTML $groupName | Attribute Value";
            break;
    }


    $str = "";

    $str .= "<dict>\n";
    $str .= "    <key>name</key>\n";
    $str .= "    <string>$groupTitle</string>\n";
    $str .= "    <key>scope</key>\n";
    $str .= "    <string>\n";
    $str .= $useScopes . "\n";
    $str .= "    </string>\n";
    $str .= "    <key>settings</key>\n";
    $str .= "    <dict>\n";
    $str .= "        <key>foreground</key>\n";
    $str .= "        <string>$color</string>\n";
    $str .= "    </dict>\n";
    $str .= "</dict>\n";


    return $str;
}










$newXML = generateThemeSpecialScopes($thisDir, $specialMarkup);
foreach ($themeDefinition as $groupName => $rules) {
    $scopes = [];

    foreach ($rules["tags"] as $tag) {
        $scopes[$tag] = [$htmlTags[$tag], in_array($tag, $emptyTags)];
    }


    $newXML .= generateThemeForXMLMarkup(
        $groupName, 
        "punctuaction",
        $scopes, 
        $rules["punctuaction"]);

    $newXML .= generateThemeForXMLMarkup(
        $groupName, 
        "tagname",
        $scopes, 
        $rules["tagname"]);

    
    $attrRules = $rules["attributes"];
    if ($attrRules["name"] !== null) {
        $newXML .= generateThemeForXMLMarkup(
            $groupName, 
            "attrName",
            $scopes, 
            $attrRules["name"]);
    }
    if ($attrRules["equal"] !== null) {
        $newXML .= generateThemeForXMLMarkup(
            $groupName, 
            "attrEqual",
            $scopes, 
            $attrRules["equal"]);
    }
    if ($attrRules["quotes"] !== null) {
        $newXML .= generateThemeForXMLMarkup(
            $groupName, 
            "attrQuotes",
            $scopes, 
            $attrRules["quotes"]);
    }
    if ($attrRules["value"] !== null) {
        $newXML .= generateThemeForXMLMarkup(
            $groupName, 
            "attrValue",
            $scopes, 
            $attrRules["value"]);
    }
}



file_put_contents($newMarkup, $newXML);
