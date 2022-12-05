<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$cargo = cargo();
$lines = import_lines_as_array($input);
$cargo = steps($lines, $cargo);
$topLayer = retrieve_top_layered_crates($cargo);
dump($topLayer);

function cargo()
{
    $cargo[1] = ['F','C','P','G','Q','R'];
    $cargo[2] = ['W','T','C','P'];
    $cargo[3] = ['B','H','P','M','C'];
    $cargo[4] = ['L','T','Q','S','M','P','R'];
    $cargo[5] = ['P','H','J','Z','V','G','N'];
    $cargo[6] = ['D','P','J'];
    $cargo[7] = ['L','G','P','Z','F','J','T','R'];
    $cargo[8] = ['N','L','H','C','F','P','T','J'];
    $cargo[9] = ['G','V','Z','Q','H','T','C','W'];

    return $cargo;
}

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }

    return $lines;
}

function steps($lines, $cargo)
{

    foreach ($lines as $line) {
        $line = explode(' ', $line);
        for($i=0; $i<$line[1]; $i++){
            $cargo = move($cargo, $line[3], $line[5]);
        }
    }

    return $cargo;
}

function move($cargo, $from, $to){
    // Get key and value of last item of the $from array
    $crate = end($cargo[$from]);
    $crateKey = array_key_last($cargo[$from]);

    // Add it for the $to array
    $cargo[$to][] = $crate;
    // Remove from the $from array
    unset($cargo[$from][$crateKey]);

    return $cargo;
}

function retrieve_top_layered_crates($cargo)
{
    $topLayer = "";
    foreach($cargo as $row) {
        $topLayer .= end($row);
    }

    return $topLayer;
}

function dump($var) {
    echo "<pre style='background-color: #86ae84; color: #283028; padding: 3px; border: 2px dashed #526c51;'>";var_dump($var);echo "</pre>";
}

function dump_exit($var)
{
    dump($var);
    exit();
}