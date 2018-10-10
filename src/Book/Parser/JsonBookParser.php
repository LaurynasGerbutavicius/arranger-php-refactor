<?php

namespace Book\Parser;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 20.10
 */
class JsonBookParser implements BookParserInterface
{

    public function parse($input): array
    {
        $elements = json_decode($input);
        $results = [];

        foreach ($elements as $element) {
            $results[] = [
                'title' => $element->book->title,
                'author' => $element->book->author,
                'isbn' => $element->book->isbn,
                'quantity' => $element->stock->level,
                'price' => $element->stock->price,
            ];
        }

        return $results;
    }

    public function getFormat(): string
    {
        return 'json';
    }
}