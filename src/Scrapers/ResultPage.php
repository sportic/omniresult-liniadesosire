<?php

namespace Sportic\Omniresult\LiniaDeSosire\Scrapers;

use Sportic\Omniresult\LiniaDeSosire\Helper;
use Sportic\Omniresult\LiniaDeSosire\Parsers\EventPage as Parser;

/**
 * Class CompanyPage
 * @package Sportic\Omniresult\LiniaDeSosire\Scrapers
 *
 * @method Parser execute()
 */
class ResultPage extends AbstractScraper
{
    /**
     * @param $id
     */
    public function setId($id)
    {
        $idParams = Helper::decodeResultId($id);
        $this->initialize($idParams);
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->getParameter('eventId');
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }

    /**
     * @return mixed
     */
    public function getContest()
    {
        return $this->getParameter('contest');
    }

    /**
     * @return mixed
     */
    public function getListName()
    {
        return $this->getParameter('listname');
    }

    /**
     * @return mixed
     */
    public function getBib()
    {
        return $this->getParameter('bib');
    }

    /**
     * @return string
     */
    public function getCrawlerUri()
    {
        return $this->getCrawlerUriHost()
            . '/RRPublish/data/list.php?callback=jQuery&r=bib2'
            . '&eventid=' . $this->getEventId()
            . '&key=' . $this->getKey()
            . '&listname=' . urlencode($this->getListName())
            . '&contest=' . $this->getContest()
            . '&bib=' . $this->getBib();
    }
}
