<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$lines = import_lines_as_array($input);
$answer = count_step_for_position($lines);

dump($answer);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function count_step_for_position($lines) {

    $options = [
        'forward ',
        'up ',
        'down ',
    ];

    $horizontal = 0;
    $aim = 0;
    $depth = 0;

    foreach($lines as $line) {

        if (strpos($line, $options[0]) !== false) {
            $step = (int) str_replace($options[0], '', $line);
            $horizontal += $step;
            if ($aim > 0) {
                $depth += $aim*$step;
            }
        }
        if (strpos($line, $options[1]) !== false) {
            $aim -= (int) str_replace($options[1], '', $line);
        }
        if (strpos($line, $options[2]) !== false) {
            $aim += (int) str_replace($options[2], '', $line);
        }
    }

    return $horizontal * $depth;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}