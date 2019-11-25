<?php

require '../vendor/autoload.php';

$parameters = [
    'eventId' => '77',
    'raceId' => '184',
    'page' => 0
];

$client = new \Sportic\Omniresult\LiniaDeSosire\LiniaDeSosireClient();
$resultsParser = $client->results($parameters);

/** @var \Sportic\Omniresult\Common\Content\ListContent $resultsData */
$resultsData = $resultsParser->getContent();

var_dump($resultsData->getPagination());
var_dump($resultsData->getRecords());
