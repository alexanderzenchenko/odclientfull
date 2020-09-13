<?php


namespace App\Services\TagsCloudService;


use App\Repository\SearchesRepository;

class TagsCloudService implements TagsCloudInterface
{
    private $repository;
    private $tagsCount;

    public function __construct(SearchesRepository $repository, int $tagsCount)
    {
        $this->repository = $repository;
        $this->tagsCount = $tagsCount;
    }

    public function getSearches()
    {
        return $this->repository->getTop($this->tagsCount);
    }
}