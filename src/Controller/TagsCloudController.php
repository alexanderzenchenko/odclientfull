<?php


namespace App\Controller;

use App\Services\TagsCloudService\TagsCloudInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TagsCloudController extends AbstractController
{
    /**
     * @Route("/tags-cloud", name="tags_cloud")
     * @param TagsCloudInterface $tagsCloudService
     * @param SerializerInterface $serializer
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(TagsCloudInterface $tagsCloudService)
    {
        $searches = $tagsCloudService->getSearches();

        return $this->json($searches);
    }
}