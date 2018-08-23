<?php

include_once ('vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

//ini_set('date.timezone', 'Europe/Amsterdam');

$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
$currentUri->setQuery('');

require_once  ('init.php');
