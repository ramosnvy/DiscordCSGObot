<?php

require 'vendor\autoload.php';
require 'src\DraftSearchTeam.php';
require 'src\DraftSearchInfo.php';
require 'src\Functions.php';

use GuzzleHttp\Client;
use Ramos\HttpRequest\DraftSearch\DraftSearchInfo;
use Ramos\HttpRequest\DraftSearch\DraftSearchTeam;
use Ramos\HttpRequest\DraftSearch\Functions;
use Symfony\Component\DomCrawler\Crawler;

$functions = new Functions();

$client = new Client(['base_uri' => 'https://draft5.gg', 'verify' => false]);

$crawlerInfo = new Crawler();
$crawlerTeam = new Crawler();

$resultInfo = new DraftSearchInfo($client, $crawlerInfo);
$resultTeam = new DraftSearchTeam($client, $crawlerTeam);

$listInfo = $resultInfo->requestInfo('/proximas-partidas');
$listTeams = $resultTeam->requestTeam('/proximas-partidas');

$resultado = $functions->showFeaturedMatches($listTeams, $listInfo);





