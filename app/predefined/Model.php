<?php

/**
 * Model Class : Implements all basic functions required by Model
 * Author : Ashwani Kumar
 * Date : 18 Dec 2019
 */


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


    //Returns all records
    public static function all() {

        $table = self::get_table_name();

        $sql = "SELECT * from $table";

        $result = self::query_result_array($sql);

        return $result;

    }


    //Returns single record by ID
    public static function find_by_id($id) {

        $id = self::escaped_string($id);

        $table = self::get_table_name();

        $sql = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";

        $result = self::query_result_array($sql);

        if(empty($result)) {
            return array();
        }

        return $result[0];


    }



}



?>