<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);
$answers = sonar($lines);
$answers2 = count_increased($answers);
dump($answers2);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function sonar($lines) {

    $answers = [];

    foreach ($lines as $index => $line) {
        $answers[$index] = $line;
        if($index-1 >= 0) {
            $answers[$index-1] += $line;
        }
        if($index-2 >= 0) {
            $answers[$index-2] += $line;
        }
    }

    return $answers;
}

function count_increased($lines) {

    $increased = 0;
    $previousLine = 0;

    foreach($lines as $key => $line) {
        if ($key != 0) {
            if ($line > $previousLine) {
                $increased++;
            }
        }

        $previousLine = $line;
    }

    return $increased;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}