<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LayoutController extends AbstractController
{
    #[Route('/layout', name: 'app_layout')]
    public function index(): Response
    {
        return $this->render('layout/index.html.twig', [
            'controller_name' => 'LayoutController',
        ]);
    }

    #[Route('/addtable', name: 'addtable')]
    public function addtable(): Response
    {
        return $this->render('popupTable/popupTable.html.twig', [
            'controller_name' => 'LayoutController',
        ]);
    }
    #[Route('/tab', name: 'app_tableau')]
    public function tableau(): Response
    {
        return $this->render('tableau/tableau.html.twig', [
            'controller_name' => 'LayoutController',
        ]);
    }
    #[Route('/popup', name: 'app_popup')]
    public function popup(): Response
    {
        return $this->render('popup/popup.html.twig', [
            'controller_name' => 'LayoutController',
        ]);
    }


   


}

