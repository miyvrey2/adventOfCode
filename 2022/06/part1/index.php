<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all lines
$chars = import_lines_as_array($input);
$score = score($chars);

function import_lines_as_array($input)
{
    $lines = [];

    foreach ($input as $line) {
        $lines[] = $line;
    }
    $chars = str_split( $lines[0]);

    return $chars;
}

function score($chars)
{
    foreach($chars as $key => $char) {
        $tmp_array = array_slice($chars, $key, 4);
        $tmp_array = array_unique($tmp_array);
        if(count($tmp_array) == 4) {
            dump_exit($key + 4);
        }
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