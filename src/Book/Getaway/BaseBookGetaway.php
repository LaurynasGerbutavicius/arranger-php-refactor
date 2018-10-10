<?php

namespace Book\Getaway;


/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.10
 * Time: 19.35
 */

use Book\Parser\BookParserInterface;
use Book\Util\UrlBuilder;
use GuzzleHttp\Client;

abstract class BaseBookGetaway
{
    protected $_bookParser;

    public function __construct(BookParserInterface $bookParser)
    {
        $this->_bookParser = $bookParser;
    }

    private function queryApi($pathName, $queryData)
    {
        $url = UrlBuilder::buildUrl($this->getOrigin(), $pathName, $queryData);

        $client = new Client(['base_url' => $this->getOrigin()]);

        $response = $client->get($url);

        return $response->getBody()->getContents();
    }

    protected function getData($pathName, $queryData)
    {
        $content = $this->queryApi($pathName, $queryData);

        return $this->_bookParser->parse($content);
    }

    protected abstract function getOrigin();
}