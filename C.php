<?php

$input = [
    '3 1',
    '1 2',
    '2 3',
    '2 3',
];


// Extract visitors and beds from input
list($visitors, $beds) = array_map('intval', explode(' ', $input[0]));

// Remove first line
array_shift($input);

$bookings = [];

foreach ($input as $line) {
    list($from, $to) = array_map('intval', explode(' ', $line));
    $isAccepted = false;
    if (!$bookings) {
        $bookings[] = ['from' => $from, 'to' => $to];
    }
    else {
        foreach ($bookings as $booking) {
            if (ifBookingShouldBeAccepted($booking, $from, $to)) {
                $isAccepted = true;
            }
        }
    }

    if ($isAccepted) {
        $bookings[] = ['from' => $from, 'to' => $to];
    }
}

function ifBookingShouldBeAccepted($booking, $from, $to)
{
    global $bookings, $beds;

    if ( ($from == $booking['from'] || $to == $booking['to'])) {
        $sameBookings = countSameBookings($from, $to);
        if ($sameBookings < $beds) { var_dump('Here');
            return true;
        }
        return false;
    }
    elseif ($from >= $booking['to'] || $to <= $booking['from']) {
        return true;
    }

    return false;
}

function countSameBookings($from, $to) 
{
    global $bookings, $beds;

    $count = 0;

    foreach ($bookings as $book) {
        if ($book['from'] == $from || $book['to'] == $to) {
            $count++;
        }
    }

    return $count;
}

fprintf(STDOUT, "%s", count($bookings));