<?php
session_start();


$input = !empty($_POST["input"]) ? $_POST["input"] : "";
$part = !empty($_POST["part"]) ? $_POST["part"] : "1";

if ($part == 1) {
    $input = str_split($input);

    $sum = 0;
    foreach ($input as $char) {
        $char == '(' ? $sum++ : $sum--;
    }
    $_SESSION["eredmeny"] = $sum;
} elseif ($part == 2) {
    $input = str_split($input);

    $sum = 0;
    $i = 1;
    foreach ($input as $char) {
        $char == '(' ? $sum++ : $sum--;
        if($sum == -1) break;
        $i++;
    }
    $_SESSION["eredmeny"] = $i;
}

header("location: index.php?feladat=1");