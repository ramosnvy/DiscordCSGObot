<?php

require 'vendor\autoload.php';
require 'src\DraftSearchTeam.php';

use GuzzleHttp\Client;
use Ramos\HttpRequest\DraftSearch\DraftSearchTeam;
use Symfony\Component\DomCrawler\Crawler;


$client = new Client(['base_uri' => 'https://draft5.gg', 'verify' => false]);
$crawler = new Crawler();

$result = new DraftSearchTeam($client, $crawler);

$url = '/proximas-partidas';

$listTeams = $result->requestTeam($url);

$count = (count($listTeams) / 2) - 1;

$odd = array();
$even = array();


foreach ($listTeams as $k => $v) {
    if ($k % 2 == 0) {
        $even[] = $v;
    } else {
        $odd[] = $v;
    }
}


for ($i = 0; $i <= $count; $i++) {
    echo "$even[$i] vs $odd[$i]" . PHP_EOL;
}



