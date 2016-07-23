# Aeon Digital - Dark Theme

> Desenvolvido por [Aeon Digital](http://aeondigital.com.br)
> 
> Otimizado para Visual Studio Code versão 1.3.1.

Esquema de cores desenvolvido para editores compatíveis com o padrão [TextMate themes](https://macromates.com) utilizando o [TmTheme Editor](http://tmtheme-editor.herokuapp.com)


## Linguagens suportadas
Para esta versão, a seguinte coleção de linguagens foram escolhidas para serem contempladas.


- PHP
- X/HTML
- CSS
- Javascript
- JSON
- XML



## Screenshots

** PHP **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_php.png)
-


-
** HTML **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_html.png)
-


-
** CSS **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_css.png)
-


-
** Javascript **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_js.png)
-


-
** JSON **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_json.png)
-


-
** XML **

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_xml.png)
-



## Ajustes para VS Code
Até a versão atual (1.3.1) por algum motivo desconhecido, o esquema de cores definido para X/HTML não é corretamente carregado pelo VS Code e alguns estilos só serão observados corretamente efetuando a seguinte alteração em seu arquivo de configurações pessoais:

    Menu:
    File -> Preferences -> User Settings

    // Adicione as seguintes chaves em "files.associations":
    "files.associations": {
        "*.html" : "php",
        "*.htm" : "php"
    },



## Bugs conhecidos
Mais estranho que a necessidade do ajuste indicado acima é que o estilo "JS Value String" que define a cor de strings cercadas por aspas simples e duplas em contexto de código Javascript funcionará APENAS em arquivos .html, .htm, .php e .phtml.
Segue abaixo um screenshot do mesmo trecho de código mostrado acima para Javascript mas aberto em um arquivo ".js". Por algum acaso, justo para arquivos ".js" o estilo dos textos não pega.

![](https://github.com/AeonDigital/Code-Editor-Themes/raw/master/aeondigital-dark/screenshots/screenshot_bug_01.png)





________________________________________________________________________________