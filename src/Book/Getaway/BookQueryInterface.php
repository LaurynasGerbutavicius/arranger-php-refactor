<?php

namespace Book\Getaway;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.10
 * Time: 19.53
 */

interface BookQueryInterface
{
    public function getBooksByAuthor($authorName, $limit);
    public function getListOfAuthors($authorName);
}