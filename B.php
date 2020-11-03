<?php

$inputs = [
    '8 529 382 130 462 223 167 235 529',
    '12 528 129 376 504 543 363 213 138 206 440 504 418',
    '0'
];

$data = [];

foreach ($inputs as $trip) {
    if ($trip === '0') exit;

    $items = explode(' ', $trip);
    array_shift($items);
    $backpacks = [1 => 0, 2 => 0];
    foreach ($items as $item) {

        if ($backpacks[1] >= $backpacks[2]) {
            $backpacks[2] += $item;
        }
        else {
            $backpacks[1] += $item;
        }
    }
    display($backpacks[1], $backpacks[2]);
}

function display($first, $second)
{
    fprintf(STDOUT, "%s\n", $first > $second ? $first . ' ' . $second : $second . ' ' . $first);
} 