<?php

    //Import functions
    require_once('init.php');



    /**
     * Define your endpoints
     */


    //Endpoint to Render about framework
    if($_REQUEST['url']=='' && $_SERVER['REQUEST_METHOD']=='GET') {
        Response::render('home');
    }


    //Endpoint to get all records of entity
    if($_REQUEST['url']=='api/students' && $_SERVER['REQUEST_METHOD']=='GET') {

        $data = Student::all();

        Response::json(200, $data, 'OK');

    }

    
    if(preg_match("/api\/student\/\d+/", $_REQUEST['url']) && $_SERVER['REQUEST_METHOD']=='GET') {

        preg_match('/\d+/', $_REQUEST['url'], $match);
        $id = $match[0];

        $record = Student::find_by_id($id);

        Response::json(200, $data = $record, 'Request Accepted');

    }

    


    //Endpoint to save entity
    if($_REQUEST['url']=='api/student' && $_SERVER['REQUEST_METHOD']=='POST') {

        $name = Request::body('name');

        $age = Request::body('age');

        $student = Student::save(array(
            "name" => $name,
            "age" => $age
        ));

        if($student) {

            Response::json(201, $data = $student, 'Student saved');

        } else {

            Response::json(500, $data = $student, 'Student not saved');

        }

        

    }


    /**End of defining endpoints */
 

?>