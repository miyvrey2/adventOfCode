<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$lines = import_lines_as_array($input);
$score = collectScore($lines);
dump($score);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function collectScore($lines) {
    $opponentCalculatingScore = [
        'A' => 1,
        'B' => 2,
        'C' => 3
    ];
    $myCalculatingScore = [
        'X' => 1,
        'Y' => 2,
        'Z' => 3
    ];

    $myScore = 0;

    foreach($lines as $line) {

        // Find the password and the policy
        $line = explode(' ', $line);

        $myHand = myHand($opponentCalculatingScore[$line[0]], $myCalculatingScore[$line[1]]);

        $myScore = $myScore + $myHand;

        if ($opponentCalculatingScore[$line[0]] + 1 == $myHand ||
            ($opponentCalculatingScore[$line[0]] == 3 && $myHand == 1)) {
            $myScore += 6;
        } else if ($opponentCalculatingScore[$line[0]] == $myHand) {
            $myScore += 3;
        } else {
            $myScore += 0;
        }
    }

    return $myScore;
}

function myHand($opponentHand, $outcome) {

    if ($outcome == 1) {
        if($opponentHand == 1) {
            $myHand = 3;
        } else {
            $myHand = $opponentHand - 1;
        }
    } else if ($outcome == 2) {
        $myHand = $opponentHand;
    } else {
        if($opponentHand == 3) {
            $myHand = 1;
        } else {
            $myHand = $opponentHand + 1;
        }
    }

    return $myHand;
}

function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var) {
    dump($var);
    exit();
}