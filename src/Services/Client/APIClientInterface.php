<?php


namespace App\Services\Client;


interface APIClientInterface
{
    public function setLang(string $lang);
    public function setWord(string $word);
    public function setFields(string $fields);
    public function getWord(): string ;
    public function getLang(): string ;
    public function getFields(): string ;
    public function get();
}