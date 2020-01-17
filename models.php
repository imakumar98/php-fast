<?php

/**
 * File contains all models used in this project
 * 
 * Author : Ashwani Kumar
 * 
 * Date : 14 Jan 2020
 */


//Model Associative Array
$models = array();


$models['student'] = array(
    array('name', 'string', true),
    array('age', 'number', true),
);

$models['book'] = array(
    array('title', 'string', true),
    array('price', 'number', true),
);


$models['car'] = array(
    array('name', 'string', true),
    array('price', 'number', false),
);



$models['device'] = array(
    array('name', 'string', true),
    array('price', 'number', true)
);





?>