<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerCRUDController extends AbstractController
{
    #[Route('', name: 'app_controller_c_r_u_d')]
    public function index(): Response
    {
        return $this->render('controller_crud/index.html.twig', [
            'controller_name' => 'ControllerCRUDController',
        ]);
    }
}