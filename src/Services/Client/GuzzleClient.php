<?php


namespace App\Services\Client;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleClient implements APIClientInterface
{
    private $lang;
    private $word;
    private $fields;
    private $client;

    public function __construct(string $baseUrl, string $appId, string $appKey, string $fields)
    {
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'accept' => 'application/json',
                'app_id' => $appId,
                'app_key' => $appKey,
            ]
        ]);

        $this->setFields($fields);
    }

    public function setLang(string $lang)
    {
        $this->lang = strtolower($lang);
    }

    public function setWord(string $word)
    {
        $this->word = strtolower($word);
    }

    public function setFields(string $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return string
     * @throws GuzzleException
     * @throws WordNotFoundException
     */
    public function get()
    {
        $uri = $this->lang.'/'.$this->word;

        try {
            $response = $this->client->request('GET', $uri, [
                'query' => ['fields' => $this->fields]
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }

        if ($response->getStatusCode() != 200) {
            throw new WordNotFoundException('Word not found');
        }

        return $response->getBody()->getContents();
    }
}