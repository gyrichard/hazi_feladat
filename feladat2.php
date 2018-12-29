<?php
session_start();

$input = !empty($_POST["input"]) ? $_POST["input"] : "";
$part = !empty($_POST["part"]) ? $_POST["part"] : "1";

$input = explode("\n",$input);
$meretek = array();

foreach ($input as $in){
    array_push($meretek,array_map('intval', explode("x",$in)));
}

if ($part == "1") {
    $papir = 0;
    $csomag_papirok = array();

    foreach ($meretek as $meret) {
        $dim = array(($meret[0] * $meret[1]), ($meret[1] * $meret[2]), ($meret[0] * $meret[2]));
        array_push($csomag_papirok, 2 * $dim[0] + 2 * $dim[1] + 2 * $dim[2] + min($dim));
    }

    $papir = array_sum($csomag_papirok);

    $_SESSION["eredmeny"] = $papir;

} elseif ($part == "2"){

    $ribbon = 0;
    $csomag_ribbons = array();

    foreach ($meretek as $meret) {
        asort($meret);
        $meret = array_values($meret);

        //$dim = array(($meret[0] * $meret[1]), ($meret[1] * $meret[2]), ($meret[0] * $meret[2]));

        array_push($csomag_ribbons, (2*$meret[0]+2*$meret[1])+($meret[0]*$meret[1]*$meret[2]));
    }


    $ribbon = array_sum($csomag_ribbons);

    $_SESSION["eredmeny"] = $ribbon;
}

header("location: index.php?feladat=2");