<?php

namespace App\DataFixtures;

use App\Entity\Searches;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $words = [
            "the","of","and","a","to","in","is","you","that","it","he","was","for","on","are","as","with","his",
            "they","I","at","be","this","have","from","or","one","had","by","word","but","not","what","all","were","we",
            "when","your","can","said","there","use","an","each","which","she","do","how","their","if","will","up",
            "other","about","out","many","then","them","these","so","some","her","would","make","like","him",
            "into","time","has","look","two","more","write","go","see","number","no","way","could","people","my","than",
            "first","water","been","call","who","oil","its","now","find","long","down","day","did","get","come","made",
            "may","part"
        ];

        foreach ($words as $word) {
            $searches = new Searches();
            $searches->setWord($word);
            $count = rand(10000, 500000);
            $searches->setCount($count);
            $manager->persist($searches);
        }

        $manager->flush();
    }
}
