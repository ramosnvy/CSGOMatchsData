<?php

namespace Pedroramos\Estudocomposer\tools;

use Symfony\Component\DomCrawler\Crawler;

require "vendor/autoload.php";


class Tools
{

    private Crawler $crawler;

    public function __construct(Crawler $crawler )
    {
        $this->crawler = $crawler;
    }
    function getFormatedTeams (){

        $elementsInfo = $this->crawler->filter('td.team-left');


        $elementLeft = [];
        foreach ($elementsInfo as $elementInfo) {
            $elementLeft[] = $elementInfo->textContent;

        }

        $arrayLeftTeams = [];

        for($i = 0; $i < count($elementLeft); $i++ ){

            $string = $elementLeft[$i];

            $arrayLeftTeams[$i] = str_replace(' ', '', $string);

        }


        $elementsInfo =$this->crawler->filter('td.team-right');

        $elementRight = [];
        foreach ($elementsInfo as $elementInfo) {
            $elementRight[] = $elementInfo->textContent;

        }

        $arrayRightTeams = [];
        for($i = 0; $i < count($elementRight); $i++ ){

            $string = $elementRight[$i];

            $arrayRightTeams[$i] = str_replace(' ', '', $string);


        }

        $teams = [];
        for ($i = 0; $i < count($elementLeft); $i++){
            $teamLeft = preg_replace('/\s+/', '', $arrayLeftTeams[$i]);
            $teamRight = preg_replace('/\s+/', '', $arrayRightTeams[$i]);
            $teams[$i] = "$teamLeft vs $teamRight";
        }

        return $teams;

    }

}