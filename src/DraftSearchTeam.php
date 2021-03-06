<?php

namespace Ramos\HttpRequest\DraftSearch;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class DraftSearchTeam
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function requestTeam($url): array
    {
        $elementTest = [];

        $answer = $this->httpClient->request('GET', $url);
        $html = $answer->getBody();
        $this->crawler->addHtmlContent($html);

        $elementsTeam1 = $this->crawler->filter('div.FeaturedMatchCard__Team-p3u2z5-4.gFaxwi');


        foreach ($elementsTeam as $elementTeam) {
            $elementTest[] = $elementTeam->textContent;
        }
        return $elementTest;
    }

}