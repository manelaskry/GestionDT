<?php

namespace App\Controller;

use App\Entity\user;
use App\Form\SignupType;
use Composer\DependencyResolver\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/sign', name: 'app_sign', methods: ['GET'])]
    public function sign(): Response
    {
        return $this->render('layout/sign.html.twig', [

            'controller_name' => 'UserController',
        ]);
    }
    #[Route('/adduser', name: 'app_adduser')]
    public function adduser(Request $request, EntityManagerInterface $em): Response
    {
        $user = new User();
        $form = $this->createForm(SignupType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_sign', [], Response::HTTP_SEE_OTHER);
        }



        return $this->render('layout/sign.html.twig', [

            'controller_name' => 'UserController',
            'form' => $form->createView(),
        ]);
    }
}
