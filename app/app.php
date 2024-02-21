<?php

declare(strict_types=1);

//Code

function getFiles(string $dir_Path): array
{

    $files = [];
    foreach (scandir($dir_Path) as $file) {
        if (is_dir($file)) {
            continue;
        } else {
            $files[] = $dir_Path . $file;
        }
    }
    return $files;
}

function getTransiactions(string $file_path, ?callable $transiactionHandler = null): array
{

    if (!file_exists($file_path)) {

        trigger_error("File" . $file_path . " does not exists", E_USER_ERROR);
    }
    $transiactions = [];

    $file = fopen($file_path, "r");

    fgetcsv($file);

    while ($transiaction = fgetcsv($file)) {

        if ($transiactionHandler !== null) {

            $transiactions[] = $transiactionHandler($transiaction);

        } else {

            $transiactions[] = $transiaction;
        }
    }
    fclose($file);
    return $transiactions;
}

function extractData(array $transiactionRow): array
{
    [$date, $check, $desc, $amount] = $transiactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);
    return [
        "date" => $date,

        "check" => $check,

        "desc" => $desc,

        "amount" => $amount
    ];
}

function calculateTotals(array $transiactions): array
{
    $totals = ['netTotals' => 0, 'incomeTotals' => 0, 'outcomeTotals' => 0];

    foreach ($transiactions as $transiaction) {

        $totals['netTotals'] += $transiaction['amount'];

        if ($transiaction['amount'] >= 0) {

            $totals['incomeTotals'] += $transiaction['amount'];

        } else {

            $totals['outcomeTotals'] += $transiaction['amount'];
        }

    }
    return $totals;
}