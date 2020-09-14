<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Services\Dictionary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request, Dictionary $dictionary)
    {
        $word = $request->query->get('word');

        $words = $dictionary->entries('en-gb', 'word');

        dump($word);
        dump($words);

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
}
