<?php


namespace App\Entity;


class Entry
{
    private $definitions;
    private $pronunciations;

    /**
     * @return mixed
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param mixed $definitions
     */
    public function setDefinitions($definitions): void
    {
        $this->definitions = $definitions;
    }

    /**
     * @return mixed
     */
    public function getPronunciations()
    {
        return $this->pronunciations;
    }

    /**
     * @param mixed $pronunciations
     */
    public function setPronunciations($pronunciations): void
    {
        $this->pronunciations = $pronunciations;
    }
}