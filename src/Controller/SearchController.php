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
     *
     * @param Request $request
     * @param Dictionary $dictionary
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, Dictionary $dictionary)
    {
        $word = $request->query->get('word');

        $entries = $dictionary->entries('en-gb', $word);

        return $this->render('search/index.html.twig', [
            'word' => $word,
            'entries' => $entries,
        ]);
    }
}
