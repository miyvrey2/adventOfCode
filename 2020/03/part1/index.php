<?php

$grid = explode(PHP_EOL, file_get_contents('./input.txt', true));

$x1 = sled(1, 1, $grid);
$x2 = sled(1, 3, $grid);
$x3 = sled(1, 5, $grid);
$x4 = sled(1, 7, $grid);
$x5 = sled(2, 1, $grid);

echo $x1 * $x2 * $x3 * $x4 * $x5;

function sled($step_to_down, $step_to_right, $grid) {
    $position = 1;
    $count_trees = 0;

    // For each vertical line
    foreach($grid as $key => $line) {
        if($step_to_down == 2) {
            if($key % 2 == 1) {
                continue;
            }
        }

        // If out of bounds
        if($position >= 31 ) {
            $position -= 31;
        }

        // If we encounter a 'tree', note
        if($line[$position - 1] == '#') {
            $count_trees++;
        }

        // increase 3 steps to the right
        $position += $step_to_right;
    }

    return $count_trees;
}