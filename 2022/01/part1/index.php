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

        $elves[$i] = (int) $elves[$i] + (int) $line;

        if($line == null) {
            $i++;
        }
    }

    return $elves;
}


function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var) {
    dump($var);
    exit();
}