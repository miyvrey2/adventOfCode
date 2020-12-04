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

        // Validate passport fields
        $validated_fields = validate_fields($passport);
        if ($validated_fields == false ) {
            unset($passports[$passport_id]);
        }
    }

    return $passports;
}

function validate_fields($fields) {
    // Lets count every valid field on the passport
    $validated_fields = 0;
    foreach($fields as $key => $field) {
        $validated_fields += validate_field($key, $field);
    }

    // When we have 7 or more validated fields, it seems to be okay
    if ($validated_fields == 7) {
        return true;
    }
    return false;
}

function validate_field($key, $value) {
    switch ($key) {
        case 'byr':
            return (is_numeric($value) && strlen($value) == 4 && $value >= 1920 && $value <= 2002) ? 1 : 0;
            break;
        case 'iyr':
            return (is_numeric($value) && strlen($value) == 4 && $value >= 2010 && $value <= 2020) ? 1 : 0;
            break;
        case 'eyr':
            return (is_numeric($value) && strlen($value) == 4 && $value >= 2020 && $value <= 2030) ? 1 : 0;
            break;
        case 'hgt':
            $matrix = (strpos($value,'in') !== false) ? 'in' : '';
            if($matrix == "") {
                $matrix = (strpos($value,'cm') !== false) ? 'cm' : '';
            }
            if($matrix == "") {
                return 0;
            }
            $height = str_replace($matrix, '', $value);
            if(($matrix == 'in' && $height >= 59 && $height <= 76) || ($matrix == 'cm' && $height >= 150 && $height <= 193)) {
                return 1;
            } else {
                return 0;
            }
            break;
        case 'hcl':
            return (preg_match('/#([a-f0-9]{3}){1,2}\b/i', $value)) ? 1 : 0;
            break;
        case 'ecl':
            $ecl = ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'];
            return (in_array($value, $ecl)) ? 1 : 0;
            break;
        case 'pid':
            return (is_numeric($value) && strlen($value) == 9) ? 1 : 0;
            break;
    }
}