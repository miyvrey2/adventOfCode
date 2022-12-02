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
    $opponentHand = [
        'A' => 1,
        'B' => 2,
        'C' => 3
    ];
    $myHand = [
        'X' => 1,
        'Y' => 2,
        'Z' => 3
    ];

    $myScore = 0;

    foreach($lines as $line) {

        // Find the password and the policy
        $line = explode(' ', $line);

        $myScore = (int) $myScore + $myHand[$line[1]];

        // If my hand is one score higher than my opponent, or is his the highest, and I am the lowest, I win
        if ($opponentHand[$line[0]] + 1 == $myHand[$line[1]] ||
            ($opponentHand[$line[0]] == 3 && $myHand[$line[1]] == 1)) {
            $myScore += 6;
        }
        // Are we the same, it's a draw
        else if ($opponentHand[$line[0]] == $myHand[$line[1]]) {
            $myScore += 3;
        }
        // Or I loose
        else {
            $myScore += 0;
        }
    }

    return $myScore;
}

function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var) {
    dump($var);
    exit();
}