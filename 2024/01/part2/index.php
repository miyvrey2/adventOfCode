<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);

$answerLeft = [];
$answerRight = [];

foreach($lines as $key => $line) {
    $answer = explode("   ", $line);
    $answerLeft[] = $answer[0];
    $answerRight[] = $answer[1];
}

// get the difference between each answer from index and count
$answer = 0;
foreach($answerLeft as $key => $value) {
    $answer += $value * array_count_values_of($value, $answerRight);
}

dump_exit($answer);

function array_count_values_of($value, $array) {
    $counts = array_count_values($array);
    return $counts[$value] ?? 0;
}

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var) {
    dump($var);
    exit();
}