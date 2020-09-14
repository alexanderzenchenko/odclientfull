<?php


namespace App\Services\APIResponseParser;


use App\Entity\Entry;

class APIResponseParser implements APIResponseParserInterface
{

    public function parse(string $input): array
    {
        $decoded = json_decode($input);

        $result = [];

        foreach($decoded->results as $results) {
            foreach($results->lexicalEntries as $lexicalEntries) {
                foreach($lexicalEntries->entries as $entries) {

                    $pron = [];

                    if (property_exists($entries, 'pronunciations')) {
                        foreach($entries->pronunciations as $pronunciations) {
                            $pron[] = $pronunciations->audioFile;
                        }
                    }

                    $def = [];

                    foreach ($entries->senses as $senses) {
                        if (property_exists($entries, 'pronunciations')) {
                            foreach ($senses->definitions as $definition) {
                                $def[] = $definition;
                            }
                        }
                    }

                    $entry = new Entry();
                    $entry->setPronunciations($pron);
                    $entry->setDefinitions($def);

                    $result[] = $entry;
                }
            }
        }

        return $result;
    }
}