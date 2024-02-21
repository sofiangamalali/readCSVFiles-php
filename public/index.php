<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define("APP_PATH", $root . "app" . DIRECTORY_SEPARATOR);

define("FILES_PATH", $root . "transiaction_files" . DIRECTORY_SEPARATOR);

define("VIEWS_PATH", $root . "views" . DIRECTORY_SEPARATOR);

require APP_PATH . "app.php";

$files = getFiles(FILES_PATH);

$transiactions = [];


foreach ($files as $file) {

    $transiactions = array_merge($transiactions, getTransiactions($file, "extractData"));
}

$totalAmount = calculateTotals($transiactions);
require APP_PATH. "helpers.php";
require VIEWS_PATH . "transiaction.php";
// The transations will be available in this file 