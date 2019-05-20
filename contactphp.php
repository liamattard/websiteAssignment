<?php

class Db 
{
    // the databse connection
    protected static $connection;

    public function connect()
    {
        
        // try to connect to database
        if(!isset(self::$connection))
        {
            $config = parse_ini_file ('./config.ini');
            self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
            // echo "Database connection successful";
        }
        // if connection not successful, handle the error
        if(self::$connection == false)
        {
            echo "Database not found";
            return false;
        }
        return self::$connection;
    }

    public function query($query)
    {

        //connect to the db
        $connection = $this -> connect();
        $result = $connection -> query($query);
        return $result; 

    }
    public function select ($query)
    {
        $rows = array();
        $result = $this -> query($query);

        if($result == false)
        {

            return false;
        }
        while ($row = $result -> fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }

    public function error()
    {

        $connection = $this -> connect();
        return $connection -> error;
    }

    public function quote($value)
    {

        $connection = $this ->connect();
        return "'". $connection -> real_escape_string($value)."'";
    }


}







?>
