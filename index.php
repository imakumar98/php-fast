<?php

    //Import functions
    require_once('init.php');


    //Endpoint to Render about framework
    if($_REQUEST['url']=='' && $_SERVER['REQUEST_METHOD']=='GET') {
        Response::render('home');
    }


    //Endpoint to get all entities
    if($_REQUEST['url']=='api/students' && $_SERVER['REQUEST_METHOD']=='GET') {

        $data = Student::all();

        Response::json(200, $data, 'OK');

    }
 

?>