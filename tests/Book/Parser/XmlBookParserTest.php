<?php
/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 22.27
 */

namespace Book\Parser\JsonBookParserTest;


use Book\Parser\XmlBookParser;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class XmlBookParserTest extends TestCase
{
    /* @var $parser XmlBookParser */
    private $parser;

    protected function setUp()
    {
        $this->parser = new XmlBookParser();
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
            ["<root/>", []],
            ['<root>
                <books>
                    <book name="book1" author_name="author1" isbn_number="isbn1">
                        <stock number="123" unit_price="12.34">
                        </stock>
                    </book>
                </books>
            </root>',
                [
                    [
                        'title' => 'book1',
                        'author' => 'author1',
                        'isbn' => 'isbn1',
                        'quantity' => 123,
                        'price' => 12.34
                    ]
                ]
            ]
        ];
    }
}