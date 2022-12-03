<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$lines = import_lines_as_array($input);
$errorInput = find_error_input($lines);
dump($errorInput);

function import_lines_as_array($input)
{
    $lines = [];
    $i = 0;

    foreach ($input as $key => $line) {
        if($key % 3 == 0) {
            $i++;
        }
        $lines[$i][] = $line;
    }

    return $lines;
}

function find_error_input($lines) {
    $errorInput = [];
    $score = 0;
    $alphabetLowercase = range('a', 'z');
    $alphabetUppercase = range('A', 'Z');
    $alphaToInt = array_merge($alphabetLowercase, $alphabetUppercase);
    $alphaToInt = array_combine(range(1, count($alphaToInt)), array_values($alphaToInt));

    foreach ($lines as $key => $line) {

        $chars = array_unique(str_split($line[0]));

        foreach($chars as $char) {
            if(strpos($line[1], $char) !== false) {
                if (strpos($line[2], $char) !== false) {
                    $errorInput[] = $char;
                    $score += array_search($char, $alphaToInt);
                }
            }
        }
    }

    dump_exit($score);
}

function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var) {
    dump($var);
    exit();
}