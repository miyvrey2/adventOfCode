<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$elves = import_lines_per_elf($input);
dump(max($elves));

function import_lines_per_elf($input)
{
    $i = 0;
    $elves = [];

    foreach ($input as $line) {
        if(!isset($elves[$i])) {
            $elves[$i] = 0;
        }
        if(!isset($elves[$i])) {
            $elves[$i] = 0;
        }
        $elves[$i] = (int) $elves[$i] + (int) $line;

        if($line == null) {
            $i++;
        }
    }

    return $elves;
}


function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}