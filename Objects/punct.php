<?php

class Punct{
 
    // database connection and table name
    private $table_name = "punct";
    private $conn;
    // object properties
    public $id;
    public $x;
    public $y;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
function read(){
 
    // select all query
    $query = "SELECT id,x,y
            FROM
                punct";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

function create(){
 
    // query to insert record
    $query = "INSERT INTO
                punct
            SET
                x=:x, y=:y";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // bind values
    $stmt->bindParam(":x", $this->x);
    $stmt->bindParam(":y", $this->y);
 
    // execute query
    $stmt->execute();
    return $this->conn->lastInsertId();
     
}

}
?>