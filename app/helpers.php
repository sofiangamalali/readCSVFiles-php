<?php

declare(strict_types=1);

function formatDollarAmount(float $number): string
{

    return ($number < 0 ? '-' : '') . '$' . number_format(abs($number), 2);
}

function formatDate(string $date): string
{

    return date('M j, Y', strtotime($date));
}