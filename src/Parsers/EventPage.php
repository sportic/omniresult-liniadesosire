<?php

namespace Sportic\Omniresult\LiniaDeSosire\Parsers;

use Sportic\Omniresult\Common\Content\ParentListContent;
use Sportic\Omniresult\Common\Models\Event;
use Sportic\Omniresult\Common\Models\Race;
use Sportic\Omniresult\LiniaDeSosire\Parsers\Traits\HasJsonConfigTrait;

/**
 * Class EventPage
 * @package Sportic\Omniresult\Endu\Parsers
 */
class EventPage extends AbstractParser
{
    use HasJsonConfigTrait;

    protected $returnContent = [];

    /**
     * @return array
     */
    protected function generateContent()
    {
        $configArray = $this->getConfigArray();

        $params = [
            'record' => $this->parseEvent($configArray['sportEvent']),
            'records' => $this->parseRaces($configArray['numberCategories'])
        ];

        return $params;
    }

    /**
     * @param $config
     * @return Event
     */
    public function parseEvent($config)
    {
        $event = new Event([
            'id' => $config['id'],
            'name' => $config['name'],
            'city' => $config['location'],
        ]);

        $event->setDateFromFormat(DATE_RFC3339_EXTENDED, $config['eventDate']);
        return $event;
    }

    /**
     * @param $config
     * @return Race[]
     */
    public function parseRaces($config)
    {
        $racesArray = $config;
        $races = [];
        foreach ($racesArray as $raceItem) {
            $races[$raceItem['externalId']] = [
                'id' =>$raceItem['id'],
                'name' =>$raceItem['name'],
            ];
        }
        return $races;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritdoc
     */
    protected function getContentClassName()
    {
        return ParentListContent::class;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritdoc
     */
    public function getModelClassName()
    {
        return Race::class;
    }
}
