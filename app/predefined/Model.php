<?php

/**
 * Model Class : Implements all basic functions required by Model
 * Author : Ashwani Kumar
 * Date : 18 Dec 2019
 */


class Model extends Database {

    
    //Function to save record
    public static function save($hashmap) {

        $connection = self::get_connection();

        $table = self::get_table_name();

        $key_values = self::hashmap_to_string($hashmap);

        $sql = "INSERT INTO $table ($key_values[0]) VALUES ($key_values[1])";

        $result = mysqli_query($connection, $sql);

        if(!$result) return die("Query Failed. Error : ". mysqli_error($connection));

        $inserted_id = mysqli_insert_id($connection);

        $record = self::find_by_id($inserted_id);

        return $record;


    }

    //Returns string of `,` sepatated keys & values by hashmap as parameter
    public static function hashmap_to_string($hashmap){

        $keys = ''; $values = ''; $column_count = count($hashmap); $i = 0;

        foreach($hashmap as $key=>$value){

            if(($i+1)==$column_count) {

                $keys.= $key; $values.= "'".$value."'";
                
            }else {

                $keys.= $key.','; $values.= "'".$value."'".",";

            } 
                
            $i++;

        }

        $key_values = array($keys, $values);

        return $key_values;

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