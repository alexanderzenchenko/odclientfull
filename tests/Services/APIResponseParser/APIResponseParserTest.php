<?php

namespace App\Tests\Services\APIResponseParser;

use App\Services\APIResponseParser\APIResponseParser;
use PHPUnit\Framework\TestCase;

class APIResponseParserTest extends TestCase
{

    public function testParse()
    {
        $response = <<<RSP
{ "id": "word", "metadata": { "operation": "retrieve", "provider": "Oxford University Press", "schema": "RetrieveEntry" }, "results": [ { "id": "word", "language": "en-gb", "lexicalEntries": [ { "entries": [ { "pronunciations": [ { "audioFile": "https://audio.oxforddictionaries.com/en/mp3/word_gb_1_8.mp3", "dialects": [ "British English" ], "phoneticNotation": "IPA", "phoneticSpelling": "wəːd" } ], "senses": [ { "definitions": [ "a single distinct meaningful element of speech or writing, used with others (or sometimes alone) to form a sentence and typically shown with a space on either side when written or printed" ], "id": "m_en_gbus1167030.006", "subsenses": [ { "definitions": [ "a single distinct conceptual unit of language, comprising inflected and variant forms." ], "id": "m_en_gbus1167030.009" }, { "definitions": [ "something spoken or written; a remark or statement" ], "id": "m_en_gbus1167030.010" }, { "definitions": [ "even the smallest amount of something spoken or written" ], "id": "m_en_gbus1167030.011" }, { "definitions": [ "angry talk" ], "id": "m_en_gbus1167030.013" }, { "definitions": [ "speech as distinct from action" ], "id": "m_en_gbus1167030.015" } ] }, { "definitions": [ "a command, password, or signal" ], "id": "m_en_gbus1167030.017", "subsenses": [ { "definitions": [ "communication; news" ], "id": "m_en_gbus1167030.018" } ] }, { "definitions": [ "one's account of the truth, especially when it differs from that of another person" ], "id": "m_en_gbus1167030.020", "subsenses": [ { "definitions": [ "a promise or assurance" ], "id": "m_en_gbus1167030.021" } ] }, { "definitions": [ "the text or spoken part of a play, opera, or other performed piece; a script" ], "id": "m_en_gbus1167030.023" }, { "definitions": [ "a basic unit of data in a computer, typically 16 or 32 bits long." ], "id": "m_en_gbus1167030.025" } ] } ], "language": "en-gb", "lexicalCategory": { "id": "noun", "text": "Noun" }, "text": "word" }, { "entries": [ { "pronunciations": [ { "audioFile": "https://audio.oxforddictionaries.com/en/mp3/word_gb_1_8.mp3", "dialects": [ "British English" ], "phoneticNotation": "IPA", "phoneticSpelling": "wəːd" } ], "senses": [ { "definitions": [ "express (something spoken or written) in particular words" ], "id": "m_en_gbus1167030.043" } ] } ], "language": "en-gb", "lexicalCategory": { "id": "verb", "text": "Verb" }, "text": "word" }, { "entries": [ { "pronunciations": [ { "audioFile": "https://audio.oxforddictionaries.com/en/mp3/word_gb_1_8.mp3", "dialects": [ "British English" ], "phoneticNotation": "IPA", "phoneticSpelling": "wəːd" } ], "senses": [ { "definitions": [ "used to express agreement or affirmation" ], "id": "m_en_gbus1167030.050" } ] } ], "language": "en-gb", "lexicalCategory": { "id": "interjection", "text": "Interjection" }, "text": "word" } ], "type": "headword", "word": "word" } ], "word": "word" }
RSP;

        $parser = new APIResponseParser();
        $result = $parser->parse($response);
    }
}
