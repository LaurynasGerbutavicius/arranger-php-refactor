<?php

namespace Book\Parser\JsonBookParserTest;

use Book\Parser\JsonBookParser;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 21.46
 */
class JsonBookParserTest extends TestCase
{
    /* @var $parser JsonBookParser */
    private $parser;

    protected function setUp()
    {
        $this->parser = new JsonBookParser();
    }

    /**
     * @dataProvider data
     */
    public function testParse($input, $expected)
    {
        $this->assertEquals($expected, $this->parser->parse($input));
    }

    public function data()
    {
        return [
            ["{}", []],
            [
                json_encode([
                    [
                        'book' => [
                            'title' => 'book1',
                            'author' => 'author1',
                            'isbn' => 'isbn1'
                        ],
                        'stock' => [
                            'level' => 123,
                            'price' => 12.34
                        ]
                    ],
                ]),
                [
                    [
                        'title' => 'book1',
                        'author' => 'author1',
                        'isbn' => 'isbn1',
                        'quantity' => 123,
                        'price' => 12.34
                    ],
                ]
            ]
        ];
    }


}