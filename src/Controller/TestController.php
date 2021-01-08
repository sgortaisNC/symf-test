<?php

namespace App\Controller;

use App\Entity\Classes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class TestController extends AbstractController
{

    /**
     * @Route("/add-classes", name="test")
     */
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://fr.dofus.dofapi.fr/classes');
        $content = json_decode($response->getContent());

        $entityManager = $this->getDoctrine()->getManager();


        foreach ($content as $cont){
            $classe = new Classes();
            $classe->setNom($cont->name);

            $entityManager->persist($classe);
        }

        $entityManager->flush();


        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/classes/{id}", name="class_show")
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $id) : \Symfony\Component\HttpFoundation\Response
    {
        $classe = $this->getDoctrine()
            ->getRepository(Classes::class)
            ->find($id);

        if (!$classe) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('test/classe.html.twig', [
            'nom' => $classe->getNom(),
        ]);
    }

    /**
     * @Route("/classes", name="all_classes")
     */
    public function showAll():  \Symfony\Component\HttpFoundation\Response
    {

        $repository = $this->getDoctrine()->getRepository(Classes::class);

        $classes = $repository->findAll();

        return $this->render('test/classes.html.twig', [
            'classes' => $classes,
        ]);
    }
}
