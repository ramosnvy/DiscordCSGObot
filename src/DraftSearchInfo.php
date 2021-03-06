<?php

namespace Ramos\HttpRequest\DraftSearch;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class DraftSearchInfo
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function requestInfo($url): array
    {
        $elementTest = [];

        $answer = $this->httpClient->request('GET', $url);
        $html = $answer->getBody();
        $this->crawler->addHtmlContent($html);

        $elementsInfo = $this->crawler->filter('div.FeaturedMatchCard__Tournament-p3u2z5-2.oMWgc');


        foreach ($elementsInfo as $elementInfo) {
            $elementTest[] = $elementInfo->textContent;
        }
        return $elementTest;
    }

}