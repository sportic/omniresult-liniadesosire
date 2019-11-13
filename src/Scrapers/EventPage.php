<?php

namespace Sportic\Omniresult\LiniaDeSosire\Scrapers;

use Sportic\Omniresult\LiniaDeSosire\Parsers\EventPage as Parser;

/**
 * Class CompanyPage
 * @package Sportic\Omniresult\Endu\Scrapers
 *
 * @method Parser execute()
 */
class EventPage extends AbstractScraper
{
    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->getParameter('eventId');
    }

    /**
     * @throws \Sportic\Omniresult\Common\Exception\InvalidRequestException
     */
    protected function doCallValidation()
    {
        $this->validate('eventId');
    }

    /**
     * @inheritdoc
     */
    protected function generateCrawler()
    {
        $client = $this->getClient();
        $crawler = $client->request(
            'GET',
            $this->getCrawlerUri()
        );

        return $crawler;
    }

    /**
     * @return array
     */
    protected function generateParserData()
    {
        $this->getRequest();

        return [
            'response' => $this->getClient()->getResponse(),
        ];
    }

    /**
     * @return string
     */
    public function getCrawlerUri()
    {
        return $this->getCrawlerUriHost()
            . '/FinishLine.Application/sportevents/getsportevent?id='
            . $this->getEventId();
    }
}
