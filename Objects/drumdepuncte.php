<?php
class Drumdepuncte{
 
    // database connection and table name
    private $conn;
    private $table_name = "drumdepuncte";
 
    // object properties
    public $id;
    public $id_punct;
    public $id_calatorie;
    public $ordine;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){
 
    // select all query
    $query = "SELECT id,id_punct,id_calatorie,ordine
            FROM
                drumdepuncte";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                drumdepuncte
            SET
                id_punct=:id_punct,
                id_calatorie=:id_calatorie,
                ordine=:ordine";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // bind values
    $stmt->bindParam(":id_punct", $this->id_punct);
    $stmt->bindParam(":id_calatorie", $this->id_calatorie);
    $stmt->bindParam(":ordine", $this->ordine);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
    return false;
     
}

// search products
function search($keywords){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}
?>