<?php

/**
 * Database Class
 * Base class having all database functions
 * Date: 18 Dec 2019
 */


//Import configuration file
// require_once($_SERVER['DOCUMENT_ROOT'].'/php-fast'.'/config/config.php');



class Database {

    //Returns connection
    public static function get_connection() {

        $connection = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);

        if(!$connection) return die("Database connection failed!!".mysqli_error());

        return $connection;
            
    }


    //Returns query result
    public static function query($sql) {

        $connection = self::get_connection();

        $result = mysqli_query($connection, $sql);

        if(!$result) return die("Query Failed. Error: ".mysqli_error($connection));

        return $result;
    
    }


    //Returns query result in array
    public static function query_result_array($sql) {

        $connection = self::get_connection();

        $result = mysqli_query($connection, $sql);

        if(!$result) return die("Query Failed. Error: ".mysqli_error($connection));

        $result_array = array();

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $result_array[] = $row;

        }
        return $result_array;
    
    }

    //Return escaped string
    public static function escaped_string($string) {

        $connection = self::get_connection();

        return trim(mysqli_real_escape_string($connection, $string));

    }


}




?>