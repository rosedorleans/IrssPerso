<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class HomeController
 * @package App\Controller
 * @Route("", name="home_")
 */
class HomeController extends AbstractController
{

    /**
     * @Route("", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }


}