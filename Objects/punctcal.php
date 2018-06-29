<?php

class Punctcal{
 
    // database connection and table name
    private $conn;
    // object properties
    public $id;
    public $x;
    public $y;
    public $id_calatorie;
    public $data;
    public $ora;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // read products
function read(){
 
    // select all query
    $query = "SELECT p.id,p.x,p.y, d.id_calatorie, c.ora, c.data, c.locuridisponibile
            FROM
                punct p, drumdepuncte d, calatorie c
                where p.id = d.id_punct and d.id_calatorie = c.id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
    $num = $stmt->rowCount();
 
// check if more than 0 record found
   if($num>0){
 
    // products array
    $puncte_arr=array();
    $puncte_arr["puncte"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row1111111111111111
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $puncte_item=array(
            "id" => $id,
            "x" => $x,
            "y" => $y,
            "id_calatorie" => $id_calatorie,
            "data"=> $data,
            "ora" => $ora
        );
 
        array_push($puncte_arr["puncte"], $puncte_item);
    }
    return $puncte_arr;
}
}
}
?>