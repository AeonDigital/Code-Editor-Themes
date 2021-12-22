<?php
/**
* @package      Aeon Digital Theme
* @author       Author Rianna Cantarelli
*/
namespace Loja\Controllers;

use CodeCraft\REST\Controller as Controller;
use CodeCraft\BasicTools\BasicTools as BT;


const AEON_CONSTANT = "Aeon Digital";





/**
* Class Description
*/
abstract class ClassName extends InheritedClass implements iInterface {

    public int $setInteger = 5;

    /**
    * Method Description
    *
    * @param string    $one                Parameter $one
    * @param string    [$two = "two"]      Parameter $two
    *
    * @return bool
    */
    public function MethodName(string $one, $two = "two") : bool
    {
        require_once('phpscript.php');
        include("teste");
        define('__ROOT__', dirname(dirname(__FILE__)));

        $routes = array();
        $var_string = "value";
        $var_number = 10;
        $var_bool = true;
        $var_instance = new \Teste\AnotherClass();
        $dt = new \DateTime();

        $var_cast = (int)"32";
        $pos = strpos($var_string);

        // Assoc Array
        $routes["Key"] = [
            "keyName_1"       => "value_1",
            "keyName_2"       => "value_2",
        ];

        $this->ExecuteMethod($one, "another arg", 10);
        $innerHTML = "<body class=\"use-\"" . $var_str . "\"class\">${var_str}</body>";

        BT::RetrieveHTTPInformation($__DomainConfig["DefaultApplication"]);

        $strSQL = "SELECT * FROM Teste WHERE column=$teste";
        $strSQL = "UPDATE Teste SET column='333' WHERE id=3";
        $strSQL = "DELETE FROM Teste WHERE id=3";
        $strSQL = "SHOW TABLES;";

        try {
            clone $var_instance;
            switch ($var_string) {
                case "val1":
                    break;
                case "val2":
                    break;
            }
        }
        catch (\Exception $e) {
            foreach($routes as $k => $v) {

            }
        }
        finally {
            for ($i = 0; $i < count($routes); $i++) {

            }
        }

        if (1 == 1 and 2 != 3) {
            $var_number++;
        } elseif (33 === 44) {
            // bla
        } else {
            // nha!
        }



        while (1 === 2) {
            // nheco
        }

        do {
            // bla!
        } while (2 === 1);

        return $one;
    }



    public function anotherFunction() {
        return "1";
    }


}


trait traitName {
    // Trait content
}
