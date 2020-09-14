<?php


namespace App\Services;


use App\Services\APIResponseParser\APIResponseParserInterface;
use App\Services\Client\APIClientInterface;

class Dictionary
{
    private $client;
    private $parser;

    public function __construct(APIClientInterface $client, APIResponseParserInterface $parser)
    {
        $this->client = $client;
        $this->parser = $parser;
    }

    public function entries(string $lang, string $word): array
    {
        $this->client->setLang($lang);
        $this->client->setWord($word);
        $response = $this->client->get();

        return $this->parser->parse($response);
    }
}