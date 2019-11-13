<?php

namespace Sportic\Omniresult\LiniaDeSosire;

use Sportic\Omniresult\Common\RequestDetector\HasDetectorTrait;
use Sportic\Omniresult\Common\TimingClient;
use Sportic\Omniresult\LiniaDeSosire\Scrapers\EventPage;
use Sportic\Omniresult\LiniaDeSosire\Scrapers\ResultPage;
use Sportic\Omniresult\LiniaDeSosire\Scrapers\ResultsPage;

/**
 * Class LiniaDeSosireClient
 * @package Sportic\Omniresult\LiniaDeSosire
 */
class LiniaDeSosireClient extends TimingClient
{
    use HasDetectorTrait;


    /**
     * @param $parameters
     * @return \Sportic\Omniresult\Common\Parsers\AbstractParser|Parsers\EventPage
     */
    public function event($parameters)
    {
        return $this->executeScrapper(EventPage::class, $parameters);
    }

    /**
     * @param $parameters
     * @return \Sportic\Omniresult\Common\Parsers\AbstractParser|Parsers\ResultsPage
     */
    public function results($parameters)
    {
        $parameters['raceClient'] = $this;
        return $this->executeScrapper(ResultsPage::class, $parameters);
    }

    /**
     * @param $parameters
     * @return \Sportic\Omniresult\Common\Parsers\AbstractParser|Parsers\ResultPage
     */
    public function result($parameters)
    {
        return $this->executeScrapper(ResultPage::class, $parameters);
    }
}
