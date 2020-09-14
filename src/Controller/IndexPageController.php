<?php

namespace App\Controller;

use App\Form\SearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexPageController extends AbstractController
{
    /**
     * @Route("/", name="index_page")
     */
    public function index()
    {
        $form = $this->createForm(SearchFormType::class, null, [
            'action' => $this->generateUrl('search'),
            'method' => 'GET'
        ]);
        return $this->render('index_page/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
