<?php

// Get the .txt
$lines = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$passports = import_passports_as_array($lines);

// Validate passports
$validated_passports = validate_passports($passports);

// Show the amount of validated passports
echo count($validated_passports);

function import_passports_as_array($lines) {
    $passports = [];
    $passport_id = 1;

    foreach ($lines as $line) {
        if(strlen($line) == 0) {
            $passport_id++;
            continue;
        }

        $fields = explode(' ', $line);
        foreach ($fields as $field) {
            $split = explode(":", $field);
            $key = $split[0];
            $value = str_replace(":", "", $split[1]);
            $passports[$passport_id][$key] = $value;
        }
    }

    return $passports;
}

function validate_passports($passports) {
    foreach ($passports as $passport_id => $passport) {
        if (isset($passport['cid'])) {
            unset($passport['cid']);
        }

        // Remove incomplete passports
        if(count($passport) <= 6) {
            unset($passports[$passport_id]);
        }
    }

    return $passports;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}