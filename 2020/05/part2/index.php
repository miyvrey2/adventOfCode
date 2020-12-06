<?php

// Get the .txt
$lines = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$boarding_passes = import_boarding_passes_as_array($lines);

$i = 78;
foreach ($boarding_passes as $seat) {
    if ($i != $seat) {
        echo $seat . "<br>";
    }
    if($i +1 == $seat){
        $i++;
    }
    $i++;
}

function import_boarding_passes_as_array($lines) {
    $boarding_passes = [];

    foreach ($lines as $line) {
        $row = get_row_int(substr($line, 0, 7));
        $seat = get_seat_int(substr($line, 7, 9));

        $boarding_passes[] =  $row * 8 + $seat;
    }
    sort($boarding_passes);

    return $boarding_passes;
}

function get_row_int($row) {
    $row_int = 0;
    $row_splitted = str_split($row);
    $binary = [
        0 => '64',
        1 => '32',
        2 => '16',
        3 => '8',
        4 => '4',
        5 => '2',
        6 => '1',
    ];

    foreach($row_splitted as $key => $char) {
        if ($char === 'B') {
            $row_int += $binary[$key];
        }
    }

    return $row_int;
}

function get_seat_int($row) {
    $row_int = 0;
    $row_splitted = str_split($row);
    $binary = [
        0 => '4',
        1 => '2',
        2 => '1',
    ];

    foreach($row_splitted as $key => $char) {
        if ($char === 'R') {
            $row_int += $binary[$key];
        }
    }

    return $row_int;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}