<?php

# Calculate distance between two points ###
# Want to be able to calculate the distance between two points?
# The function below use the latitude and longitude of two locations, and calculate the distance between them in both miles and metric units.

/**
 * @param $latitude1
 * @param $longitude1
 * @param $latitude2
 * @param $longitude2
 * @return array
 */
function getDistance($latitude1,$longitude1,$latitude2,$longitude2){
    $theta = $longitude1 - $longitude2;
    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;

    return compact('meters','kilometers','yards','feet','miles');
}

// Usage:

$point1 = ['lat' => 40.7585021,'long' => -73.9180483];
$point2 = ['lat' =>40.7582781,'long' => -73.917776];

$distance = getDistance($point1['lat'],$point1['long'],$point2['lat'],$point2['long']);
//var_dump($distance);

foreach ($distance as $unit => $value) {
    echo " ".$unit . ": ". number_format($value,4)."\n";
}













