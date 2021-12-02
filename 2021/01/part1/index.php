<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);
$answer = count_increased($lines);
dump($answer);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
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