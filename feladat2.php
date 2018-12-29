<?php
session_start();

$input = !empty($_POST["input"]) ? $_POST["input"] : "";
//$part = !empty($_POST["part"]) ? $_POST["part"] : "1";

$input = explode("\n",$input);
$meretek = array();

foreach ($input as $in){
    array_push($meretek,array_map('intval', explode("x",$in)));
}

$papir = 0;
$csomag_papirok = array();

foreach ($meretek as $meret){
    $dim = array(($meret[0]*$meret[1]),($meret[1]*$meret[2]),($meret[0]*$meret[2]));
    array_push($csomag_papirok, 2*$dim[0]+2*$dim[1]+2*$dim[2]+min($dim));
}

$papir = array_sum($csomag_papirok);

$_SESSION["eredmeny"] = $papir;

header("location: index.php?feladat=2");