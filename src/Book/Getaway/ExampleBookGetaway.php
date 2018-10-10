<?php

namespace Book\Getaway;


/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 20.04
 */
class ExampleBookGetaway extends BaseBookGetaway implements BookQueryInterface
{
    public function getBooksByAuthor($authorName, $limit = 10)
    {
        $pathName = "/by-author";
        $queryData = [
            'q' => $authorName,
            'limit' => $limit,
            'format' => $this->_bookParser->getFormat()
        ];

        return $this->getData($pathName, $queryData);
    }

    public function getListOfAuthors($authorName)
    {
        $pathName = "/list-authors";
        $queryData = [
            'q' => $authorName,
            'format' => $this->_bookParser->getFormat()
        ];

        return $this->getData($pathName, $queryData);
    }


    protected function getOrigin()
    {
        return "http://api.book-seller-example.com";
    }
}
