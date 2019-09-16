<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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
}
