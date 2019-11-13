<?php

namespace Sportic\Omniresult\LiniaDeSosire\Scrapers;

use Sportic\Omniresult\LiniaDeSosire\Parsers\EventPage as Parser;

/**
 * Class CompanyPage
 * @package Sportic\Omniresult\LiniaDeSosire\Scrapers
 *
 * @method Parser execute()
 */
class ResultsPage extends AbstractScraper
{
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
     * @return string
     */
    public function getCrawlerUri()
    {
        return $this->getCrawlerUriHost()
            . '/FinishLine.Application/races/results?page=0&pageSize=30&searchCriteria='
            . '&raceID=' . $this->getEventId();
    }


    /**
     * @inheritdoc
     */
    protected function generateParserData()
    {
        $data = parent::generateParserData();

        $currentListName = $this->getListName();
        $contest = $this->getContest();

        $dataEvent = $this->getParameter('raceClient')->event(['eventId' => $this->getEventId()])->getContent();
        $races = $dataEvent ->getRecords();

        $list = $races[$contest]->lists[$currentListName];

        $data['listDetails'] = $list['Details'];

        return $data;
    }
}
