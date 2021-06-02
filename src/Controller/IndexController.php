<?php

namespace App\Controller;

use App\Repository\CategoryFormationRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class HomeController
 * @package App\Controller
 * @Route(name="home_")
 */
class IndexController extends AbstractController
{

    /**
     * @Route(path="", name="index")
     * @return Response
     */
    public function index(EventRepository $calendar, categoryFormationRepository $categoryFormationRepository): Response
    {
        $events = $calendar->findAll();

        $rendezvous = [];
        foreach ($events as $event) {
            $rendezvous[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'color' => $event->getCategoryFormation()->getColor(),
                'allDay' => $event->getAllDay(),
            ];

        }
        $categories = $categoryFormationRepository->findAll();
        $data = json_encode($rendezvous);

        return $this->render('pages/index.html.twig',  [
            'events' => $events,
            'data' => $data
        ]);
    }

}