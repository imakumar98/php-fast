<?php


/**
 * Defines Response related functions
 */

class Request {

    
    //Function to return post values
    public static function body($name) {

        if(!isset($_POST[$name])) {
            return;
        }
        
        return trim($_POST[$name]);

    }
}


?>