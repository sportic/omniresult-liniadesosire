<?php

namespace Sportic\Omniresult\LiniaDeSosire;

use Sportic\Omniresult\Common\RequestDetector\Detectors\AbstractUrlDetector;

/**
 * Class RequestDetector
 * @package Sportic\Omniresult\LiniaDeSosire
 */
class RequestDetector extends AbstractUrlDetector
{
    protected $path = null;
    protected $pathParts = null;

    /**
     * @inheritdoc
     */
    protected function isValidRequest()
    {
        if (in_array(
            $this->getUrlComponent('host'),
            [
                'app.liniadesosire.ro'
            ]
        )) {
            return true;
        }
        return parent::isValidRequest();
    }

    /**
     * @return string
     */
    protected function detectAction()
    {
        $path = $this->getPath();

        if ($path == 'en/raceresults') {
            return 'event';
        }
        return '';
    }

    /**
     * @inheritdoc
     */
    protected function detectParams()
    {
        $queryString = $this->getUrlComponent('query');
        parse_str($queryString, $query);

        $return['eventid'] = $query['id'];
        return $return;
    }

    /**
     * @return string|null
     */
    public function getPath()
    {
        if ($this->path === null) {
            $this->path = strtolower($this->getUrlComponent('path'));
            $this->path = trim($this->path, '/');
        }
        return $this->path;
    }

    /**
     * @return array
     */
    public function getPathParts(): array
    {
        if ($this->pathParts === null) {
            $this->detectUrlPathParts();
        }
        return $this->pathParts;
    }

    protected function detectUrlPathParts()
    {
        $this->pathParts = explode('/', $this->getPath());
    }
}
