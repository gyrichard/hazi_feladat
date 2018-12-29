<?php
session_start();

$input = !empty($_POST["input"]) ? $_POST["input"] : "";
$part = !empty($_POST["part"]) ? $_POST["part"] : "1";

$input = str_split($input);

if ($part == "1") {

    $x = 0;
    $y = 0;

    $hazak = array();
    $hazak[0][0] = 1;

    foreach ($input as $lep) {
        switch ($lep) {
            case '<':
                $x--;
                break;
            case '^':
                $y++;
                break;
            case 'v':
                $y--;
                break;
            case '>':
                $x++;
                break;
        }
        if (empty($hazak[$x][$y])) {
            $hazak[$x][$y] = 1;
        }
    }

    $dbHaz = count($hazak, COUNT_RECURSIVE) - count($hazak);
    $_SESSION["eredmeny"] = $dbHaz;
} elseif ($part == "2") {

}

header("location: index.php?feladat=3");