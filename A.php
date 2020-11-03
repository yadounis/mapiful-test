<?php

$data = [];

$years = (int) readline('Number of years to investigate : ');
for ($y = 0; $y < $years; $y++) {
    $postcards = (int) readline('Number postcards : ');
    for ($p = 0; $p < $postcards; $p++) {
        $data[$y][] = readline('City name : ');
    }
}

foreach($data as $year) {
    foreach(array_unique($year) as $city) {
        fprintf(STDOUT, "%s\n", $city);
    }
}