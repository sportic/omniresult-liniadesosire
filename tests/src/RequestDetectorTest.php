<?php

namespace Sportic\Omniresult\LiniaDeSosire\Tests;

use Sportic\Omniresult\LiniaDeSosire\RequestDetector;

/**
 * Class RequestDetectorTest
 * @package Sportic\Omniresult\LiniaDeSosire\Tests
 */
class RequestDetectorTest extends AbstractTest
{
    /**
     * @param $url
     * @param $valid
     * @param $action
     * @param $params
     * @dataProvider detectProvider
     */
    public function testDetect($url, $valid, $action, $params)
    {
        $result = RequestDetector::detect($url);

        self::assertSame($valid, $result->isValid());
        self::assertSame($action, $result->getAction());
        self::assertSame($params, $result->getParams());
    }

    /**
     * @return array
     */
    public function detectProvider()
    {
        return [
            [
                'https://app.liniadesosire.ro/en/raceresults?id=77',
                true,
                'event',
                ['eventid' => '77']
            ],
            [
                'https://my5.raceresult.com/RRPublish/data/list.php?callback=jQuery171043649401278624955_1562421070052&eventid=122816&key=a615286c279b6fcfaf20b3816f2e2943&listname=Result+Lists%7CAge+Group+Results&page=results&contest=1&r=all&l=0&_=1562421093804',
                false,
                null,
                []
            ]
        ];
    }
}
