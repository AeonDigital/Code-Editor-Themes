<?php
/**
* @package      Aeon Digital Theme
* @author       Author Rianna Cantarelli
*
* @module       Module Aeon
*/
namespace Loja\Controllers;

use CodeCraft\REST\Controller as Controller;
use CodeCraft\BasicTools\BasicTools as BT;


const AEON_CONSTANT = "Aeon Digital";





/**
* Class Description
*/
class ClassName extends InheritedClass {



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
        define('__ROOT__', dirname(dirname(__FILE__)));

        $routes = array();
        $var_string = "value";
        $var_number = 10;
        $var_bool = true;
        $var_instance = new AnotherClass();

        // Assoc Array
        $routes["Key"] = array(
            "keyName_1"       => "value_1",
            "keyName_2"       => "value_2",
        );

        $this->ExecuteMethod($one, "another arg", 10);
        $innerHTML = "<body class=\"use-\"" . $var_str . "\"class\">{$var_str}</body>";

        BT::RetrieveHTTPInformation($__DomainConfig["DefaultApplication"]);

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
            for($i = 0; $i < count($routes); $i++) {
                
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
