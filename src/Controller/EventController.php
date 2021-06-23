<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Event;
use App\Form\SearchType;
use App\Repository\CategoryFormationRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class HomeController
 * @package App\Controller
 * @Route("", name="event_")
 */
class EventController extends AbstractController
{

    /**
     * @param EventRepository $eventRepository
     * @Route("/calendar", name="calendar")
     * @return Response
     */
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

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

        return $this->render('pages/calendar.html.twig',  [
            'calendarEvents' => $events,
            'data' => $data
        ]);
    }


    /**
     * @Route("/event/{id}", name="show", methods={"GET"})
     *
     */
    public function show(Event $event, EventRepository $eventRepository): Response
    {
        $allEvents = $eventRepository->findAll();
        return $this->render('pages/eventShow.html.twig', [
            'allEvents' => $allEvents,
            'event' => $event,
        ]);
    }

    /**
     * @Route("/filters", name="filters")
     *
     */
    public function filters(EventRepository $eventRepository, CategoryFormationRepository $cfRepository, Request $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $allEvents = $eventRepository->findSearch($data);
        $categories = $cfRepository->findAll();
        return $this->render('pages/filters.html.twig', [
            'allEvents' => $allEvents,
            'allCategories' => $categories,
            'form' => $form->createView()
        ]);
    }




}