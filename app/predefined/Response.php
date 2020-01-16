<?php


/**
 * Defines Response related functions
 */

class Response {


    //Function to send JSON response
    public static function json($status_code, $data = '', $message = '') {

        http_response_code($status_code);

        $response = array();

        $response['message'] = $message;

        $response['data'] = $data;

        header('Content-Type: application/json');

        echo json_encode($response);

    }


    //Function to render page as a response
    public static function render($file) {
        
        $file = 'public/'.$file.'.php';
    
        require_once($file);

    }
}


?>