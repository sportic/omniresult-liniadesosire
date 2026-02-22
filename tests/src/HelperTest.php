<?php

namespace Sportic\Omniresult\LiniaDeSosire\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Sportic\Omniresult\LiniaDeSosire\Helper;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\RaceResults\Tests
 */
class HelperTest extends AbstractTest
{
    /**
     * @dataProvider dataDurationToSeconds
     * @param $duration
     * @param $result
     */
    #[DataProvider('dataDurationToSeconds')]
    public function testDurationToSeconds($duration, $result)
    {
        self::assertEquals($result, Helper::durationToSeconds($duration));
    }

    /**
     * @return array
     */
    public static function dataDurationToSeconds()
    {
        return [
            ['10012990', '10012.99'],
        ];
    }
}
