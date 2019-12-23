<?php

/**
 * Model Class : Implements all basic functions required by Model
 * Author : Ashwani Kumar
 * Date : 18 Dec 2019
 */


//Import Database Class for database operations use by Model class
require_once('Database.php');


class Model extends Database {

    
    public static function save($hashmap) {

        $table = self::get_table_name();

        $key_values = self::hashmap_to_string($hashmap);

        $sql = "INSERT INTO $table ($key_values[0]) VALUES ($key_values[1])";

        $result = query($sql);

        if(!$result) return die("Query Failed. Error : ". mysqli_error($connection));

        $inserted_id = mysqli_insert_id($connection);

        $record = self::find_by_id($inserted_id);

        return $record;


    }


    //Private function to get table name
    private static function get_table_name() {

        $class = get_called_class();

        return strtolower($class);

    }



}



?>