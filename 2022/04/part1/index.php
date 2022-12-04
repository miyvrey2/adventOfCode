<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$lines = import_lines_as_array($input);
$amountOfOverlaps = find_overlaps($lines);

dump($amountOfOverlaps);

function import_lines_as_array($input)
{
    $ranges = [];

    foreach ($input as $key => $line) {
        $line = explode(',', $line);
        $range1 = explode('-', $line[0]);
        $range2 = explode('-', $line[1]);
        $ranges[$key][] = $range1;
        $ranges[$key][] = $range2;
    }

    return $ranges;
}

function find_overlaps($lines) {
    $amountOfOverlaps = 0;

    foreach ($lines as $range) {
        $range1 = $range[0];
        $range2 = $range[1];
        if (($range1[0] <= $range2[0] && $range1[1] >= $range2[1]) ||
            ($range2[0] <= $range1[0] && $range2[1] >= $range1[1])) {
            $amountOfOverlaps++;
        }
    }

    return $amountOfOverlaps;
}

/**
 * @param $lines
 *
 */
function some_function($lines)
{

    foreach ($lines as $line) {

    }
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