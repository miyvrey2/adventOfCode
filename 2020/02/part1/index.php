<?php
$passwords = explode(PHP_EOL, file_get_contents('./input.txt', true));

foreach ($passwords as $password) {

    //
    echo password_policy($password) . "<br>";

}

function password_policy($line) {

    // Find the password and the policy
    $line = explode(':', $line);

    // Split
    $password = $line[1];
    $password_policy = $line[0];
    $password_policy = explode(" ", $password_policy);

    $range = $password_policy[0];
    $min = explode("-", $range)[0];
    $max = explode("-", $range)[1];
    $character = trim($password_policy[1]);

    $occurrence = substr_count($password, $character);

    if ($occurrence >= $min && $occurrence <= $max) {
        return "true";
    } else {
        return "false";
    }
}