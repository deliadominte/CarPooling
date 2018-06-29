<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../database.php';
 
// instantiate product object
include_once '../Objects/punct.php';
include_once '../Objects/calatorie.php';
 include_once '../Objects/drumdepuncte.php';
 
 
$database = new Database();
$db = $database->getConnection();
$id_owner = $_GET['usr_id'];
// get posted dat'
$data = json_decode(file_get_contents("php://input"),true);
$points = array();
for ($i = 0; $i < count($data); $i = $i +1) {
   $punct = new Punct($db);
   $punct->x = $data[$i]['x'];
   $punct->y = $data[$i]['y'];
   $punct->id = $punct->create();
   array_push($points, $punct);
} 
   //save last point
   // $punct = new Punct($db);
   // $punct->x = $data[count($data)-1]['x'];
   // $punct->y = $data[count($data)-1]['y'];
   // $punct->id = $punct->create();
   // array_push($points, $punct);

   //save last point
   $calatorie = new Calatorie($db);
   $calatorie->id_utilizator = $id_owner;
   $calatorie->locuridisponibile = 0;
   $calatorie->start = $points[0]->id;
   $calatorie->finish = $points[count($points)-1]->id;
   $calatorie->id = $calatorie->create();
   print_r($calatorie);

   for ($i = 0; $i < count($points); $i += 1) {
   $drumdepuncte = new Drumdepuncte($db);
   $drumdepuncte->id_calatorie = $calatorie->id;
   $drumdepuncte->id_punct = $points[$i]->id;
   $drumdepuncte->ordine = $i;
   $drumdepuncte->create();
   print_r($drumdepuncte);
}

?>