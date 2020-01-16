<?php

    //Import functions
    require_once('app/predefined/Response.php');


    if($_REQUEST['url']=='' && $_SERVER['REQUEST_METHOD']=='GET') {
        Response::render('home');
    }


    

    


    if($_REQUEST['url']=='api/students' && $_SERVER['REQUEST_METHOD']=='GET') {

        $data = array(
            "name" => "Ashwani",
            "age" => 10
        );

        Response::json(200, $data, 'OK');

    }
 

?>