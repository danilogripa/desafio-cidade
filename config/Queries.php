<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 04/03/2015
 * Time: 00:04
 */

return [
    'cities' => 'SELECT * FROM geodata_city',
    'suggestions' => 'SELECT * FROM geodata_city_suggestion',
    'regions' => 'SELECT * FROM geodata_region',
    'citiesFromRegion' => 'SELECT c.*, r.acronym FROM geodata_city c INNER JOIN geodata_region r ON c.regionID = r.ID where c.regionID =',
    'insertNewResult' => 'INSERT INTO isharelife.geodata_city_result (`ID`, `suggestionID`, `suggestionName`, `officialID`, `officialName`, `officialAcronym`) VALUES (NULL, ?, ?, ?, ?, ?)',

];