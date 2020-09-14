<?php


namespace App\Services\Client;


interface APIClientInterface
{
    public function setLang(string $lang);
    public function setWord(string $word);
    public function setFields(string $word);
    public function get();
}