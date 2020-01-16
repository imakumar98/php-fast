<?php


/**
 * Defines Response related functions
 */

class Response {


    //Function to send JSON response
    public static function json($status_code, $data = '', $message = '', $error = '') {

        http_response_code($status_code);

        $response = array();

        $response['message'] = $message;

        $response['data'] = $data;

        if(!empty($error)) {
            $response['error'] = $error;
        }

        header('Content-Type: application/json');

        echo json_encode($response);

    }


    //Function to send JSON error response
    public static function error($status_code, $error_message) {

        http_response_code($status_code);

        $response = array();

        $response['status'] = $status_code;
        
        $response['error'] = $error_message;

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