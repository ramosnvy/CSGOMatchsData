<?php

use GuzzleHttp\Client;
use Pedroramos\Estudocomposer\Factory\TeamsFactory;
use Symfony\Component\DomCrawler\Crawler;

require "vendor/autoload.php";




$crawler = new Crawler();
$client = new Client(['verify'=>false]);
$team = new TeamsFactory($crawler, $client);

$team->getTeams();
