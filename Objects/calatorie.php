<?php
class Calatorie{
 
    // database connection and table name
    private $conn;
    private $table_name = "calatorie";
 
    // object properties
    public $id;
    public $id_utilizator;
    public $data;
    public $locuridisponibile;
    public $ora;
    public $start;
    public $finish;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
 
    // select all query
    $query = "SELECT id,id_utilizator,data,locuridisponibile, ora,start, finish
            FROM
                calatorie";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
    
    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                calatorie
            SET
                id_utilizator=:id_utilizator,
                data=:data,
                locuridisponibile=:locuridisponibile,
                start=:start,
                finish=:finish";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // bind values
    $stmt->bindParam(":id_utilizator", $this->id_utilizator);
    $stmt->bindParam(":data", $this->data);
    $stmt->bindParam(":locuridisponibile", $this->locuridisponibile);
    $stmt->bindParam(":start", $this->start);
    $stmt->bindParam(":finish", $this->finish);
 
    // execute query
    $stmt->execute();
    return $this->conn->lastInsertId();
     
}

function update(){
 
    // update query
    $query = "UPDATE
                calatorie
            SET
                locuridisponibile = :locuridisponibile,
                data = :data,
                ora = :ora
            WHERE
                 id_utilizator= :id_utilizator and data is null";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    $this->locuridisponibile=htmlspecialchars(strip_tags($this->locuridisponibile));
    $this->data=htmlspecialchars(strip_tags($this->data));
    $this->id_utilizator=htmlspecialchars(strip_tags($this->id_utilizator));
    $this->ora=htmlspecialchars(strip_tags($this->ora));

    // bind new values
    $stmt->bindParam(":locuridisponibile", $this->locuridisponibile);
    $stmt->bindParam(":id_utilizator", $this->id_utilizator);
    $stmt->bindParam(":data", $this->data);
    $stmt->bindParam(":ora", $this->ora);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

    }

?>