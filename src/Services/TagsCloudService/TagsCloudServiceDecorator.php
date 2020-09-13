<?php


namespace App\Services\TagsCloudService;


use Symfony\Component\Cache\Adapter\AdapterInterface;

class TagsCloudServiceDecorator implements TagsCloudInterface
{
    private $tagsCloudService;
    private $cache;
    private $cacheExpiration;

    public function __construct(TagsCloudService $tagsCloudService, AdapterInterface $cache, int $cacheExpiration)
    {
        $this->tagsCloudService = $tagsCloudService;
        $this->cache = $cache;
        $this->cacheExpiration = $cacheExpiration;
    }

    public function getSearches()
    {
        $item = $this->cache->getItem('tags_cloud.searches');

        if (!$item->isHit()) {
            $item->set($this->tagsCloudService->getSearches());
            $this->cache->save($item);
            $item->expiresAfter($this->cacheExpiration);
        }

        return $item->get();
    }
}