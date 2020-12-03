<?php

$grid = explode(PHP_EOL, file_get_contents('./input.txt', true));

$position = 1;
$count_trees = 0;

// For each vertical line
foreach($grid as $line) {

    // If out of bounds
    if($position >= 31 ) {
        $position -= 31;
    }

    // If we encounter a 'tree', note
    if($line[$position - 1] == '#') {
        $count_trees++;
    }

    // increase 3 steps to the right
    $position += 3;
}

echo $count_trees;