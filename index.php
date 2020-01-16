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


    //--------------------------------------------------------------------------------------------------------------------------------------

    //General Endpoint to get all records
    if(preg_match('/api\/(.*)/', $_REQUEST['url']) && $_SERVER['REQUEST_METHOD']=='GET') {

        //1. Get Entity name
        preg_match('/api\/(.*)/', $_REQUEST['url'], $match);

        $entity = explode("/", $match[0])[1];

        $entity = substr($entity, 0, -1);


        //2. Validate Entity
        if(!isset($models[$entity])) {

            Response::error(400,'Invalid Endpoint!');

            return;

        }


        //3. Return records
        $data = Model::all_v2($entity);

        Response::json(200, $data, 'OK');

    }




    //---------------------------------------------------------------------------------------------------------------------------------------



    
    if(preg_match("/api\/student\/\d+/", $_REQUEST['url']) && $_SERVER['REQUEST_METHOD']=='GET') {

        preg_match('/\d+/', $_REQUEST['url'], $match);
        $id = $match[0];

        $record = Student::find_by_id($id);

        Response::json(200, $data = $record, 'Request Accepted');

    }


    //-------------------------------------------------------------------------------------------------------------------------------------------------------

    //General Endpoint to create record
    if(preg_match('/api\/(.*)/', $_REQUEST['url']) && $_SERVER['REQUEST_METHOD']=='POST') {


        //1. Get Entity name
        preg_match('/api\/(.*)/', $_REQUEST['url'], $match);

        $entity = explode("/", $match[0])[1];


        //2. Validate Entity
        if(!isset($models[$entity])) {

            Response::error(400,'Invalid Endpoint!');

            return;

        }

        $entity_array = $models[$entity];

        $hashmap = array();

        
        //3. Validate Input Parameters
        foreach($entity_array as $field) {

            if($field[2] && empty(Request::body($field[0]))) {
                
                Response::error(406, "Field `$field[0]` is required!");

                return;

            }else {

                $hashmap[$field[0]] = Request::body($field[0]);

            }
        }


        //4. Save Record
        $record = Model::save_v2($entity, $hashmap);

        if($record) {

            Response::json(201, $data = $record, 'Record saved');

        } else {

            Response::error(500,'Record not saved');

        }

    }


    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------



    /**End of defining endpoints */
 

?>