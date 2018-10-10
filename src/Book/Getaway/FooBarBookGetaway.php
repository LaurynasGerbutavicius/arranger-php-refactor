<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.10
 * Time: 20.10
 */

namespace Book\Getaway;


class FooBarBookGetaway extends BaseBookGetaway implements BookQueryInterface
{
    public function getBooksByAuthor($authorName, $limit = 25)
    {
        $pathName = "/type/author";
        $queryData = [
            'key' => $authorName,
            'maxResults' => $limit
        ];

        return $this->getData($pathName, $queryData);
    }

    public function getListOfAuthors($authorName)
    {
        $pathName = "/author-list";
        $queryData = [
            'key' => $authorName
        ];

        return $this->getData($pathName, $queryData);
    }


    protected function getOrigin()
    {
        return "http://www.foobar-books.com/api/get";
    }
}