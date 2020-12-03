<?php
$sum1 = $sum2 = $sum3 = explode(PHP_EOL, file_get_contents('./input.txt', true));
foreach ($sum1 as $sum1_value) {
    foreach ($sum2 as $sum2_value) {
            if ($sum1_value + $sum2_value == 2020) {
                echo "$sum1_value * $sum2_value = " . ($sum1_value * $sum2_value);
                die();
            }
    }
}