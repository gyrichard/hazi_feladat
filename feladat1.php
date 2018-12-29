<?php
session_start();


$input = !empty($_POST["input"]) ? $_POST["input"] : "";
$task = !empty($_POST["task"]) ? $_POST["task"] : "1";

if ($task == 1) {
    $input = str_split($input);

    $sum = 0;
    foreach ($input as $char) {
        $char == '(' ? $sum++ : $sum--;
    }
    $_SESSION["eredmeny"] = $sum;
} elseif ($task == 2) {
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