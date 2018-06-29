<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../database.php';
include_once '../Objects/calatorie.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize object
$calatorie = new Calatorie($db);


// set product property values
$calatorie->id_utilizator = $_GET['usr_id'];
$calatorie->locuridisponibile = $_GET['locuri'];
$calatorie->data = $_GET['data'];
$calatorie->ora = $_GET['ora'];
print_r($calatorie);
// update the product
if($calatorie->update()){
	echo '{';
		echo '"message": "Product was updated."';
	echo '}';
}

// if unable to update the product, tell the user
else{
	echo '{';
		echo '"message": "Unable to update product."';
	echo '}';
}
?>