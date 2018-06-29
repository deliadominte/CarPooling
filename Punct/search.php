<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}
 
// include database and object files
include_once '../database.php';
include_once '../Objects/punct.php';
include_once '../Objects/calatorie.php';
include_once '../Objects/punctcal.php';

 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$id_owner = $_GET['usr_id'];
 
// initialize object

$calatorie = new Calatorie($db);


$calatorie->data = $_GET['data'];
$calatorie->ora = $_GET['ora'];
$startx = $_GET['startx'];
$starty = $_GET['starty'];
$finishx = $_GET['finishx'];
$finishy = $_GET['finishy'];

$startx =floatval($startx);
$starty = floatval($starty);
$finishx = floatval($finishx);
$finishy = floatval($finishy);
// print_r($calatorie->data);
// echo '__________';
// print_r($calatorie->ora);
// echo '__________';


// print_r($startx);
// echo '__________';

// print_r($starty);
// echo '__________';

// print_r($finishx);
// echo '__________';

// print_r($finishy);


// query puncte
$punctcal = new Punctcal($db);
$punctcalarray = array();
$punctcalarray = $punctcal-> read();
// print_r(($punctcalarray));
$sIdDist = array();
$sIdIdCal = array();

$fIdDist = array();
$fIdIdCal = array();


$raza = 5;
$limitaora = 60;
$nr = count($punctcalarray['puncte']);
foreach($punctcalarray['puncte'] as $i) {
        // print_r($i['id']);
    $calc = intval($calatorie->ora);
    $calo = intval($i['ora']);
    if($calc >$calo)
        {
            $rezultc = $calc-$calo;
        }
    elseif($calc<=$calo)
    {
        $rezultc = $calo-$calc;
    }
    // print_r($rezultc);
    // echo '--';

    if(($calatorie->data == $i['data']) && ($rezultc< $limitaora))
    {

    $dist = distance($startx, $starty, floatval($i['x']),floatval($i['y']), "K");
    // print_r($dist);

    if($raza>$dist)
    {
        $idcal = $i['id'];
        $sIdDist[$idcal] = $dist;
        $sIdIdCal[$idcal] = $i['id_calatorie'];
    }
    else
    {
        $idcal = $i['id'];
        $sIdDist[$idcal] = 400;
        $sIdIdCal[$idcal] = $i['id_calatorie'];
    }
}
 else
    {
        $idcal = $i['id'];
        $sIdDist[$idcal] = 400;
        $sIdIdCal[$idcal] = $i['id_calatorie'];
    }

    
}
// print_r($sIdDist);
// print_r($sIdIdCal);

for($i=1;$i<=max($sIdIdCal);$i=$i+1){//100 e cam cate curse ar putea fi 
    $min_dists[$i]=5;//vector pereche(id_cursa,dist_min)
//5 e dist maxima ce ar putea fi
    $min_ids[$i]=0;//vector pereche(id_cursa,id_dist_min)
}
for($i=1;$i<count($sIdDist);$i=$i+1){
    if($sIdDist[$i]<$min_dists[$sIdIdCal[$i]]){
        $min_dists[$sIdIdCal[$i]]=$sIdDist[$i];
        $min_ids[$sIdIdCal[$i]]=$i;
    }
}

// print_r($min_dists);
// print_r($min_ids);  
foreach($punctcalarray['puncte'] as $i) {
    $calc = intval($calatorie->ora);
    $calo = intval($i['ora']);
    if($calc >$calo)
        {
            $rezultc = $calc-$calo;
        }
    elseif($calc<=$calo)
    {
        $rezultc = $calo-$calc;
    }
    // print_r($rezultc);
    // echo '--';

    if(($calatorie->data == $i['data']) && ($rezultc< $limitaora))
    {
    $dist = distance($finishx, $finishy, floatval($i['x']),floatval($i['y']), "K"); 
    // sqrt(pow($finish->x - $i['x'], 2) + pow($finish->y - $i['y'], 2));
    if($raza>$dist)
    {
        $idcal = $i['id'];
        $fIdDist[$idcal] = $dist;
        $fIdIdCal[$idcal] = $i['id_calatorie'];
    }
    else
    {
        $idcal = $i['id'];
        $fIdDist[$idcal] = 400;
        $fIdIdCal[$idcal] = $i['id_calatorie'];
    }
}
else
{
    $idcal = $i['id'];
        $fIdDist[$idcal] = 400;
        $fIdIdCal[$idcal] = $i['id_calatorie'];
}
    
}

// print_r($fIdDist);
// print_r($fIdIdCal);  

for($i=1;$i<=max($fIdIdCal);$i=$i+1){//100 e cam cate curse ar putea fi 
    $min_distsf[$i]=5;//vector pereche(id_cursa,dist_min)
//5 e dist maxima ce ar putea fi
    $min_idsf[$i]=0;//vector pereche(id_cursa,id_dist_min)
}
for($i=1;$i<count($fIdDist);$i=$i+1){
    if($fIdDist[$i]<$min_distsf[$fIdIdCal[$i]]){
        $min_distsf[$fIdIdCal[$i]]=$fIdDist[$i];
        $min_idsf[$fIdIdCal[$i]]=$i;
    }
}

// print_r($min_distsf);
// print_r($min_idsf); 


$max = count($min_distsf);
// echo'-----';
// print_r($max);
$min = 400;
for($i = 1;$i<=$max;$i=$i+1)
{
    if($min_distsf[$i]+$min_dists[$i] < $min && $min_ids[$i]<$min_idsf[$i])
    {
        $min = $min_distsf[$i]+$min_dists[$i];
        $punctulrezultatx = $min_ids[$i];
        $punctulrezultaty = $min_idsf[$i];
        $id_calatorie_rezultata = $i;
    }
}

        // echo 'Id punctului de start este: ';
        // print_r($punctulrezultatx);
        // echo 'Id puncutlui de finish este: ';
        // print_r($punctulrezultaty);
        // echo 'Id calatoriei rezultate este: ';
        // print_r($id_calatorie_rezultata);

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "carpooling";
 
$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $conn->prepare("SELECT ordine FROM drumdepuncte WHERE id_punct = '".$punctulrezultaty."'");
$result->execute();
$result1 = $conn->prepare("SELECT locuridisponibile FROM calatorie WHERE id = '".$id_calatorie_rezultata."'");
$result1->execute();
$row = $result->fetch();
$row1 = $result1->fetch() ;
// echo 'Ordinea punctului rezultat y  este: ';
// echo $row['ordine'];
// echo 'Locurile disponibile sunt: ';
// echo $row1['locuridisponibile'];


#TBD# ordinea calatoriei sa fie aceeasi 

// if(intval($row1['locuridisponibile'])> 0)
// echo 'Calatoria dumneavoastra are un rezultat:';





// echo json_encode($puncte_arr);
?>