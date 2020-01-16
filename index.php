<?php


    if($_REQUEST['url']=='' && $_SERVER['REQUEST_METHOD']=='GET') {
        echo "Welcome to PHP Fast";
    }


    

    


    if($_REQUEST['url']=='api/students' && $_SERVER['REQUEST_METHOD']=='GET') {

        $result = array();

        $result['data'] = array(
            "name" => "Ashwani",
            "age" => 20
        );

        echo json_encode($result);

    }
 

?>