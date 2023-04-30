<?php

namespace Pedroramos\Estudocomposer\Factory;

use GuzzleHttp\Client;
use Pedroramos\Estudocomposer\tools\Tools;
use Symfony\Component\DomCrawler\Crawler;

require "vendor/autoload.php";


class TeamsFactory
{
    private Crawler $crawler;
    private Client $client;

    /**
     * @param Crawler $crawler
     * @param Client $client
     */
    public function __construct(Crawler $crawler, Client $client)
    {
        $this->crawler = $crawler;
        $this->client = $client;

        $res = $this->client->request('GET','https://liquipedia.net/counterstrike/Liquipedia:Matches');
        $html =  $res->getBody();

        $crawler->addHtmlContent($html);
    }

    function getTeams (){

        $tools = new Tools($this->crawler);
        $teams = $tools->getFormatedTeams();
        print_r($teams);
    }
}