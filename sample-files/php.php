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
    static function MethodName($one, $two) {
        require_once('phpscript.php');
        define('__ROOT__', dirname(dirname(__FILE__)));

        $routes = array();
        $var_number = 10;
        $var_bool = true;
        $var_date = new DateTime();
        $var_instance = new AnotherClass();
        $var_instance = new ClassName();

        // Assoc Array
        $routes["Key"] = array(
            "keyName_1"       => "value_1",
            "keyName_2"       => "value_2",
            "keyName_3"       => "value_3",
            "keyName_4"       => "value_4",
            "keyName_5"       => "value_5"
        );

        $this->ExecuteMethod($one, "another arg", 10);
        $innerHTML = "<body class=\"use-\"" . $var_str . "\"class\">{$var_str}</body>";


        BT::RetrieveHTTPInformation($__DomainConfig["DefaultApplication"]);


        if(1 == 1 and 2 != 3) { 
            $var_number++;
        }

        return $one;
    }



    private function anotherFunction() {
        return "1";
    }



?>















<?php echo ""; ?>