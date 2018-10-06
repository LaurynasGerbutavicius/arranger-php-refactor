<?php

namespace Book\Getaway;

use Book\Parser\BookParserInterface;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 20.04
 */
class BookGetaway
{
    const API_URL = "http://api.book-seller-example.com";
    private $_bookParser;

    public function __construct(BookParserInterface $bookParser)
    {
        $this->_bookParser = $bookParser;
    }


    public function getBooksByAuthor($authorName, $limit = 10)
    {
        $path = "/by-author";
        $queryData = [
            'q' => $authorName,
            'limit' => $limit,
            'format' => $this->_bookParser->getFormat()
        ];

        $url = self::API_URL . $path . "?" . http_build_query($queryData);

        $client = new Client(['base_url' => self::API_URL]);

        $response = $client->get($url);

        return $this->_bookParser->parse($response->getBody()->getContents());
    }


}
