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
     * @return string
     */
    public function getCrawlerUri()
    {
        return $this->getCrawlerUriHost()
            . '/FinishLine.Application/sportevents/getsportevent?id='
            . $this->getEventId();
    }
}
