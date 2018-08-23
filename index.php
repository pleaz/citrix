<?php

use OAuth\OAuth2\Service\RightSignature;
use OAuth\Common\Storage\Mysql;
use OAuth\Common\Consumer\Credentials;

require_once 'bootstrap.php';

$storage = new Mysql();

$credentials = new Credentials(
    $servicesCredentials['rightsignature']['key'],
    $servicesCredentials['rightsignature']['secret'],
    $currentUri->getAbsoluteUri()
);

$rsService = $serviceFactory->createService('RightSignature', $credentials, $storage, array('read write'));


### examples ###

// for first getting token need manual authorize
require_once 'auth.php';

## info about token
#$storage->retrieveAccessToken('RightSignature');

## get new token (need refresh every 2 hours)
#$rsService->refreshAccessToken($storage->retrieveAccessToken('RightSignature'));


## Return information about the authenticated RightSignature User ##
$result = json_decode($rsService->request('/public/v1/me'), true);

## GET Return a list of available Documents ##
$result = json_decode($rsService->request('/public/v1/documents'), true);

## Update the tags on a given document. All old tags are removed. ##
$id = '24c6779c-c1da-4419-b775-348f9a43f8c8';
$result = json_decode($rsService->request('/public/v1/documents/'.$id.'/update_tags', 'POST', ['tags' => ['testing' => 'one', 'single' => '0']]), true);
