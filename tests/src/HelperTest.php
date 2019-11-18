<?php

namespace Sportic\Omniresult\LiniaDeSosire\Tests;

use Sportic\Omniresult\LiniaDeSosire\Helper;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\RaceResults\Tests
 */
class HelperTest extends AbstractTest
{
    /**
     * @param $duration
     * @param $result
     * @dataProvider dataDurationToSeconds
     */
    public function testDurationToSeconds($duration, $result)
    {
        self::assertEquals($result, Helper::durationToSeconds($duration));
    }

    /**
     * @return array
     */
    public function dataDurationToSeconds()
    {
        return [
            ['10012990', '10012.99'],
        ];
    }
}
