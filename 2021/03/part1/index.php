<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);
$forward = count_each_int_from_binary($lines);
$first_binary = sum_of_binary($forward);
$second_binary = inverse_binary($first_binary);
dump(bindec($first_binary) * bindec($second_binary));

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function count_each_int_from_binary($lines) {

    $answers = [];

    foreach($lines as $line) {
        $array = str_split($line);
        foreach ($array as $key => $char) {
            $answers[$key][$char] += 1;
        }
    }

    return $answers;
}

function sum_of_binary($array) {
    $answer = '';
    foreach($array as $binary) {
        if($binary[0] >= $binary[1]) {
            $answer .= "0";
        } else {
            $answer .= "1";
        }
    }

    return $answer;
}

function inverse_binary($binary) {
    $answer = '';
    $array = str_split($binary);
    foreach ($array as $char) {
        $answer .= $char == '1' ? '0' : '1';
    }
    return $answer;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}