<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../database.php';
include_once '../Objects/punct.php';
 
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$punct = new Punct($db);
 
// query puncte
$stmt = $punct->read();
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
            "y" => $y
        );
 
        array_push($puncte_arr["puncte"], $puncte_item);
    }
 
    echo json_encode($puncte_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}

?>