<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$elves = import_lines_per_elf($input);
$total_of_top_three_elves = top_three_elves($elves);
dump($total_of_top_three_elves);

/**
 * @param $input
 *
 * @return array
 */
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

/**
 * @param $elves
 *
 * @return int
 */
function top_three_elves($elves)
{
    rsort($elves);
    $top_three_elves = array_reverse(array_slice($elves, 0, 3));

    $total_of_top_three_elves = 0;
    foreach($top_three_elves as $elf) {
        $total_of_top_three_elves = (int) $total_of_top_three_elves + (int) $elf;
    }

    return $total_of_top_three_elves;
}


function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}