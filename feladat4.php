<?php
session_start();

$input = !empty($_POST["input"]) ? $_POST["input"] : "";
$part = !empty($_POST["part"]) ? $_POST["part"] : "1";

//$input = str_split($input);

if ($part == "1") {

    $i = 10000;

    do {
        $i++;
        $mo = md5($input.$i);
    } while (substr($mo,0,5)!=="00000");


    $_SESSION["eredmeny"] = "md5: ".$mo."<br>number: ".$i;

} elseif ($part == "2") {

    $i = 10000;

    do {
        $i++;
        $mo = md5($input.$i);
    } while (substr($mo,0,6)!=="000000");


    $_SESSION["eredmeny"] = "md5: ".$mo."<br>number: ".$i;

}

header("location: index.php?feladat=4");