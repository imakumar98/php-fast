<?php


/**
 * Defines Response related functions
 */

class Request {

    
    //Function to return post values
    public static function body($name) {
        
        return trim($_POST[$name]);

    }
}


?>