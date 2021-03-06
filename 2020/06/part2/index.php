<?php

// Get the .txt
$input = explode(PHP_EOL, file_get_contents('./input.txt', true));

// Retrieve all passports
$answers = import_answers_as_array($input);

$sum_answers = sum_answers($answers);
echo $sum_answers;
dump($answers);

function import_answers_as_array($input)
{
    $answers = [];
    $answer_group = 0;
    $line_count = 0;

    foreach ($input as $line) {
        if (strlen($line) == 0) {
            $answers[$answer_group]['line'] = $line_count;
            $line_count = 0;
            $answer_group++;
            continue;
        }

        $answers_per_char = str_split($line);
        foreach($answers_per_char as $char) {
            if(!isset($answers[$answer_group]['answers'][$char])) {
                $answers[$answer_group]['answers'][$char] = 1;
            } else {
                $answers[$answer_group]['answers'][$char] += 1;
            }
        }
        $line_count++;
    }

    return $answers;
}

function sum_answers($answers) {
    $i = 0;
    foreach ($answers as $group) {
        foreach($group['answers'] as $answer) {
            if($answer == $group['line']) {
                $i ++;
            }
        }
    }

    return $i;
}

function dump($var) {
    echo "<pre>";print_r($var);echo "</pre>";
}