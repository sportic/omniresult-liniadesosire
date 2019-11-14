<?php

namespace Sportic\Omniresult\LiniaDeSosire\Tests\Scrapers;

use Sportic\Omniresult\LiniaDeSosire\Scrapers\ResultsPage;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ResultPageTest
 * @package Sportic\Omniresult\LiniaDeSosire\Tests\Scrapers
 */
class ResultsPageTest extends AbstractPageTest
{
    public function testGetCrawlerUri()
    {
        $crawler = $this->getCrawler();

        static::assertInstanceOf(Crawler::class, $crawler);

        static::assertSame(
            'https://my.raceresult.com/RRPublish/data/list.php?callback=jQuery&page=results&eventid=122816&key=a615286c279b6fcfaf20b3816f2e2943&listname=Result Lists|Gender Results&contest=1',
            $crawler->getUri()
        );
    }

    /**
     * @param array $parameters
     * @return Crawler
     */
    protected function getCrawler($parameters = [])
    {
        $scraper = $this->generateScraper($parameters);
        return $scraper->getCrawler();
    }

    /**
     * @param array $parameters
     * @return ResultsPage
     */
    protected function generateScraper($parameters = [])
    {
        $default = [
            'eventId' => '122816',
            'key' => 'a615286c279b6fcfaf20b3816f2e2943',
            'contest' => '1',
            'listname' => 'Result Lists|Gender Results'
        ];
        $params = count($parameters) ? $parameters : $default;
        $params['raceClient'] = new \Sportic\Omniresult\LiniaDeSosire\RaceResultsClient();
        $scraper = new ResultsPage();
        $scraper->initialize($params);
        return $scraper;
    }
}
