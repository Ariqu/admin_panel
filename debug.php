<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


function debug($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

$example_variable = 'Hello, world!';

debug($example_variable);
?>
