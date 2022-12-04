<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$lines = import_lines_as_array($input);
$intersections = find_intersections($lines);
dump($intersections);

function import_lines_as_array($input)
{
    $ranges = [];

    foreach ($input as $key => $line) {
        $line = explode(',', $line);
        $range1 = explode('-', $line[0]);
        $range2 = explode('-', $line[1]);
        $ranges[$key][] = range($range1[0], $range1[1]);
        $ranges[$key][] = range($range2[0], $range2[1]);
    }

    return $ranges;
}

/**
 * @param $lines
 *
 */
function find_intersections($ranges)
{
    $intersections = 0;

    foreach ($ranges as $range) {
        if(array_intersect($range[0], $range[1]) || array_intersect($range[1], $range[0]) ) {
            $intersections++;
        }
    }

    return $intersections;
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