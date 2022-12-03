<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$lines = import_lines_as_array($input);
$sum = sum_priority_of_group_item_type($lines);
dump($sum);

function import_lines_as_array($input)
{
    $lines = [];
    $i = 0;

    foreach ($input as $key => $line) {
        if ($key % 3 == 0) {
            $i++;
        }
        $lines[$i][] = $line;
    }

    return $lines;
}

    function sum_priority_of_group_item_type($lines) {
    $score = 0;
    $alphaToInt = alphabetToInt();

    foreach ($lines as $line) {

        // Get each (unique) character
        $chars = array_unique(str_split($line[0]));

        foreach ($chars as $char) {

            if ((strpos($line[1], $char) !== false) && (strpos($line[2], $char) !== false)) {
                $score += array_search($char, $alphaToInt);
            }
        }
    }

    return $score;
}

/**
 * Returns array where key 1 = a, 2 = b, 3 = c, ... A = 27, B = 28, C = 29
 *
 * @return array
 */
function alphabetToInt(): array
{
    // Make 2 arrays (lower and uppercase)
    $alphabetLowercase = range('a', 'z');
    $alphabetUppercase = range('A', 'Z');

    // Merge the array
    $alphabetToInt = array_merge($alphabetLowercase, $alphabetUppercase);

    // Make sure the key start from 1, and not 0
    $alphabetToInt = array_combine(range(1, count($alphabetToInt)), array_values($alphabetToInt));

    return $alphabetToInt;
}

function dump($var)
{
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var)
{
    dump($var);
    exit();
}