<?php

namespace Book\Parser;

/**
 * Created by PhpStorm.
 * User: laurynas
 * Date: 18.10.3
 * Time: 20.09
 */
interface BookParserInterface
{
    public function parse($input): array;

    public function getFormat(): string;
}