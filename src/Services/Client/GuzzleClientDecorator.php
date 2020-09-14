<?php


namespace App\Services\Client;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class GuzzleClientDecorator implements APIClientInterface
{
    private $guzzleClient;
    private $cache;
    private $cacheExpiration;

    public function __construct(GuzzleClient $guzzleClient, AdapterInterface $cache, int $cacheExpiration)
    {
        $this->guzzleClient = $guzzleClient;
        $this->cache = $cache;
        $this->cacheExpiration = $cacheExpiration;
    }

    public function setLang(string $lang)
    {
        $this->guzzleClient->setLang($lang);
    }

    public function setWord(string $word)
    {
        $this->guzzleClient->setWord($word);
    }

    public function setFields(string $fields)
    {
        $this->guzzleClient->setFields($fields);
    }

    public function getWord(): string
    {
        return $this->guzzleClient->getWord();
    }

    public function getLang(): string
    {
        return $this->guzzleClient->getLang();
    }

    public function getFields(): string
    {
        return $this->guzzleClient->getFields();
    }

    public function get()
    {
        try {
            $item = $this->cache->getItem('word' . md5($this->getWord()));
        } catch (InvalidArgumentException $e) {
            throw $e;
        }

        if (!$item->isHit()) {
            try {
                $item->set($this->guzzleClient->get());
            } catch (WordNotFoundException $e) {
                throw $e;
            } catch (GuzzleException $e) {
                throw $e;
            }
            $this->cache->save($item);
            $item->expiresAfter($this->cacheExpiration);
        }

        return $item->get();
    }
}
