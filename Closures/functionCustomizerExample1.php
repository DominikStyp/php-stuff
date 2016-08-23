<?php

require_once './FunctionCustomizer.php';
//// example 1 - lets predefine preg_match ////

$matches = array();
$pregMatch = (new FunctionCustomizer('preg_match', 3))->setArgument(0, "#\d{2}#")->setArgumentRef(2, $matches)->getClosure();
/**
 * Step by step what have we done here:
 * - set default $matches array as reference variable for setArgumentRef()
 * - set function as built-in preg_match, and set defined number of arguments to 3
 * - set first argument of preg_match to  "#\d{2}#"
 * - set third argument of preg_match as reference variable $matches where possible matches will be stored
 * 
 *  Isn't the following syntax clear, short and powerful ? 
 */
if($pregMatch("str22")) {
    echo "<br />", "cond 1 OK", "<br />";
    var_dump($matches); //and magically we have our matches variable set via reference
}
if($pregMatch("str")){
    echo "<br />", "cond 2 OK", "<br />";
    var_dump($matches);
}
if($pregMatch("str333asdf")){
    echo "<br />", "cond 3 OK", "<br />";
    var_dump($matches);
}
