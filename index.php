<?php

$time = (object)[];

if ($_SERVER['QUERY_STRING']) {
    header('Content-type: application/json');

    $string_to_check = trim($_SERVER['QUERY_STRING']);

    if (is_numeric($string_to_check)) {

        $time->unix = $string_to_check;
        $time->natural = date("F j, Y", (int)$string_to_check);

        $time = json_encode($time);

    } else if ($date_time = strtotime($string_to_check)) {

        $time->unix = $date_time;
        $time->natural = date("F j, Y", $date_time);

        $time = json_encode($time);

    } else {

        $time->unix = NULL;
        $time->natural = NULL;

        $time = json_encode($time);
    }

    echo $time;
} else { ?>


    <!doctype html>
    <html lang="en">
    <head>
        <title>Timestamp microservice</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
              integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
              crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <h1 class="header">
            PHP API Basejump: Timestamp microservice
        </h1>
        <blockquote class="mt-5">
            <p>User stories:</p>
            <ul>
                <li>I can pass a string as a parameter, and it will check to see whether that string
                    contains either a unix timestamp or a natural language date (example: January 1, 2016)
                </li>
            </ul>
            <ul>
                <li>If it does, it returns both the Unix timestamp and the natural language form of that date.</li>
            </ul>
            <ul>
                <li>If it does not contain a date or Unix timestamp, it returns null for those properties.</li>
            </ul>
        </blockquote>
        <h3 class="mt-5">Example usage:</h3>
        <code>localhost/freecodecamp-timestamp_microservice-master/December%2015,%202015</code><br>
        <code>localhost/freecodecamp-timestamp_microservice-master/1450137600</code>
        <h3 class="mt-5">Example output:</h3>
        <code>
            {
            "unix": 1450137600,
            "natural": "December 15, 2015"
            }
        </code>
    </div>
    </body>
    </html>

    <?php
}