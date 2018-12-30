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
    $santaX = 0;
    $santaY = 0;

    $robotX = 0;
    $robotY = 0;

    $hazak = array();
    $hazak[0][0] = 1;

    $i = 0;

    foreach ($input as $lep) {
        if ($i % 2 == 0) {
            switch ($lep) {
                case '<':
                    $santaX--;
                    break;
                case '^':
                    $santaY++;
                    break;
                case 'v':
                    $santaY--;
                    break;
                case '>':
                    $santaX++;
                    break;
            }
            if (empty($hazak[$santaX][$santaY])) {
                $hazak[$santaX][$santaY] = 1;
            }
        } else {
            switch ($lep) {
                case '<':
                    $robotX--;
                    break;
                case '^':
                    $robotY++;
                    break;
                case 'v':
                    $robotY--;
                    break;
                case '>':
                    $robotX++;
                    break;
            }
            if (empty($hazak[$robotX][$robotY])) {
                $hazak[$robotX][$robotY] = 1;
            }
        }
        $i++;
    }
    $dbHaz = count($hazak, COUNT_RECURSIVE) - count($hazak);
    $_SESSION["eredmeny"] = $dbHaz;
}

header("location: index.php?feladat=3");