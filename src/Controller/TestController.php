<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\TestTable;
use Doctrine\ORM\EntityManagerInterface;


class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    /**
     * @Route("/bonjour", name="test")
     */
    public function index()
    {
        //return $this->render('test/index.html.twig', [
        //   'controller_name' => "Bonjour tous les Monde",
        //]);
        return new Response("<h1><u><center>Bonjour tous les Monde!!!<br> Monkeys Rule the World</center></u></h1>");
    }
    
    /**
     * @Route("/ajouter", name="ajoute")
     */
    public function createEtudiant(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $etudiant = new TestTable();
        $etudiant->setNom("visvan");
        $etudiant->setPrenom("bob");
        $etudiant->setAdresse("15 avenue stalin 54665 romin ville");
        $etudiant->setAge(185);
        //Persitance de l'objet
        $entityManager->persist($etudiant);
        // Exécution du INSERT INTO
        $entityManager->flush();
        
        //return new Response("Nouvel étudiant avec l'ID : ".$etudiant->getId());
        return $this->render('test\testTable.html.twig', [
           'etudiant' => $etudiant,
        ]);
    }
    
    
    /**
     * @Route("/lister", name="liste")
     */
    public function listerEtudiant(): Response
    {
        $lesetu= $this->getDoctrine()->getRepository(TestTable::class)->findall();
        
        //return new Response("Nouvel étudiant avec l'ID : ".$etudiant->getId());
        return $this->render('test\listTestTable.html.twig', [
           'etudiants' => $lesetu,
        ]);
    }
    
    
    /**
     * @Route("/selectionner/{id}", name="selection")
     */
    public function selectionner($id): Response
    {
        $lesetu= $this->getDoctrine()->getRepository(TestTable::class)->find($id);
        
        if (!$lesetu) {
            throw $this->createNotFoundException(
            'Etudiant inexistant'.$id);
        }
        //return new Response("Nouvel étudiant avec l'ID : ".$etudiant->getId());
        return $this->render('test\selectTestTable.html.twig', [
           'etudiants' => $lesetu,
        ]);
    }
}
