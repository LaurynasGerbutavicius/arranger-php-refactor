<?php

namespace Book\Parser;

use SimpleXMLElement;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 20.10
 */
class XmlBookParser implements BookParserInterface
{

    public function parse($input): array
    {
        $elements = new SimpleXMLElement($input);
        $results = [];

        foreach ($elements as $element) {
            $results[] = [
                'title' => (string)$element->book['name'],
                'author' => (string)$element->book['author_name'],
                'isbn' => (string)$element->book['isbn_number'],
                'quantity' => (int)$element->book->stock['number'],
                'price' => (float)$element->book->stock['unit_price'],
            ];
        }

        return $results;
    }

    public function getFormat(): string
    {
        return 'xml';
    }
}