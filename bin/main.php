<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 02/03/2015
 * Time: 23:15
 */

require __DIR__ . "/../src/Conn.php";

$conn = new Conn();
//var_dump($conn->getAsArray('regions'));
//var_dump($conn->getAsArray('suggestions'));
//var_dump($conn->getAsArray('cities'));
//var_dump($conn->getAsArray('citiesFromRegion', '19'));

$result = [
    "123",              // suggestionId
    "adas",             // suggestionName
    "4325",             // officialId
    "Rio de Janeiro",   // officialName
    "RJ"                // officialAcronym
];

//$conn->insertNewResult($result);

