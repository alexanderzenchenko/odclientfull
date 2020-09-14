<?php


namespace App\Services\APIResponseParser;


interface APIResponseParserInterface
{
    public function parse(string $input): array ;
}