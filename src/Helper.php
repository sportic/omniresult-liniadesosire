<?php

namespace Sportic\Omniresult\LiniaDeSosire;

/**
 * Class Helper
 * @package Sportic\Omniresult\LiniaDeSosire
 */
class Helper extends \Sportic\Omniresult\Common\Helper
{
    /**
     * @param $duration
     * @return float|int
     */
    public static function durationToSeconds($duration)
    {
        return $duration / 1000;
    }
}
