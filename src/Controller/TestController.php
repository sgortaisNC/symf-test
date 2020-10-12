<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test/bidule", name="bidule")
     */
    public function bidule()
    {
        return $this->render('test/michel.html.twig', [
            'controller_name' => 'TestController',
            'prenom' => 'michel'
        ]);
    }
}
