<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 02/03/2015
 * Time: 23:15
 */

require __DIR__ . "/../src/Conn.php";
require __DIR__ . "/../src/Validation.php";

$conn = new Conn();
$validation = new Validation();
$suggestions = $conn->getAsArray('suggestions');
$x = 1;
while ($x <= 27){
    $citiesFromRegion[$x] = $conn->getAsArray('citiesFromRegion', $x);
    $x++;
}
foreach ($suggestions as $suggestion){
    $regionID = $suggestion["regionID"];
    $cities = $citiesFromRegion[$regionID];
    if($cities != null){
        $result = $validation->run($suggestion, $citiesFromRegion[$regionID]);
        if($validation != false){
            $conn->insertNewResult($result);
        }
    }
}

echo " -- FIM DE EXECUÇÃO DO SCRIPT -- ";