<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);
$forward = count_step_for_position($lines, 'forward ');
$up = count_step_for_position($lines, 'up ');
$down = count_step_for_position($lines, 'down ');

$vertical = $down - $up;

$answer = $forward * $vertical;
dump($answer);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function count_step_for_position($lines, $position = 'forward ') {

    $step = 0;

    foreach($lines as $line) {
        if (strpos($line, $position) !== false) {
            $step += (int) str_replace($position, '', $line);
        }
    }

    return $step;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}