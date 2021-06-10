<?php

namespace App\Controller;

use App\Entity\Event;
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
     * @Route("", name="index", methods={"GET"})
     * @return Response
     */
    public function index(EventRepository $calendarRepository): Response
    {
        $events = $calendarRepository->findAll();

        $allEvents = [];
        foreach ($events as $event) {
            $allEvents[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'color' => $event->getCategoryFormation()->getColor(),
                'allDay' => $event->getAllDay(),
            ];
        }
        $data = json_encode($allEvents);

        return $this->render('pages/index.html.twig',  [
            'calendarEvents' => $events,
            'data' => $data
        ]);
    }

    /**
     * @Route("/event/{id}", name="event_show", methods={"GET"})
     *
     */
    public function show(Event $calendar): Response
    {
        return $this->render('pages/eventShow.html.twig', [
            'calendar' => $calendar,
        ]);
    }


    /**
     * @Route("/filters", name="filters", methods={"GET"})
     *
     */
    public function filters(Event $calendar): Response
    {
        return $this->render('pages/filters.html.twig', [
            'calendar' => $calendar,
        ]);
    }


}