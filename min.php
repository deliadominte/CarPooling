<?php
$sIdDist=array(
    [1] => 0.31154781898066
    [2] => 0.43096149067217
    [3] => 0.53634358143327
    [4] => 0.39488034643589
    [5] => 0.33775410748472
    [6] => 0.55556440988647
    [7] => 0.5788516641217
    [8] => 0.74754854035334
    [9] => 0.76837998294
    [10] => 0.88993465439641
    [11] => 1.055017043252
    [12] => 1.2098145880689
    [13] => 1.1888856455007
    [14] => 1.2377345200452
    [15] => 1.2588028483251
    [16] => 1.2911390345552
    [17] => 1.3371691550713
    [18] => 1.6308651084168
    [19] => 1.6638088639574
    [20] => 1.8216942593611
    [21] => 1.8043501021558
    [70] => 0.31154781898066
    [71] => 0.43096149067217
    [72] => 0.53634358143327
    [73] => 0.39488034643589
    [74] => 0.33775410748472
    [75] => 0.55556440988647
    [76] => 0.5788516641217
    [77] => 0.74754854035334
    [78] => 0.76837998294
    [79] => 0.88993465439641
    [80] => 1.055017043252
    [81] => 1.2098145880689
    [82] => 1.1888856455007
    [83] => 1.2377345200452
    [84] => 1.2588028483251
    [85] => 1.2911390345552
    [86] => 1.3371691550713
    [87] => 1.6308651084168
    [88] => 1.6638088639574
    [89] => 1.8216942593611
    [90] => 1.859786049249
    [91] => 2.0409224544778
    [92] => 2.1099872879103
    [93] => 2.1370655659289
);
$sIdIdCal=array(
    [1] => 1
    [2] => 1
    [3] => 1
    [4] => 1
    [5] => 1
    [6] => 1
    [7] => 1
    [8] => 1
    [9] => 1
    [10] => 1
    [11] => 1
    [12] => 1
    [13] => 1
    [14] => 1
    [15] => 1
    [16] => 1
    [17] => 1
    [18] => 1
    [19] => 1
    [20] => 1
    [21] => 1
    [70] => 4
    [71] => 4
    [72] => 4
    [73] => 4
    [74] => 4
    [75] => 4
    [76] => 4
    [77] => 4
    [78] => 4
    [79] => 4
    [80] => 4
    [81] => 4
    [82] => 4
    [83] => 4
    [84] => 4
    [85] => 4
    [86] => 4
    [87] => 4
    [88] => 4
    [89] => 4
    [90] => 4
    [91] => 4
    [92] => 4
    [93] => 4
);
for($i=1;$i<=max($sIdIdCal);$i=$i+1){//100 e cam cate curse ar putea fi 
    $min_dist[$i]=5;//vector pereche(id_cursa,dist_min)
//5 e dist maxima ce ar putea fi
    $min_id[$i]=0;//vector pereche(id_cursa,id_dist_min)
}
for($i=1;$i<count($sIdDist);$i=$i+1){
    if($sIdDist[$i]<$min_dist[$sIdIdCal[$i]]){
        $min_dist[$sIdIdCal[$i]]=$sIdDist[$i];
        $min_id[$sIdIdCal[$i]]=$i;
    }
}
var_dump($min_dist);
var_dump($min_id);
?>