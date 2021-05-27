<?php

namespace App\Controller;

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
    public function index(EventRepository $calendar): Response
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
                'background_color' => $event->getBackgroundColor(),
                'border_color' => $event->getBorderColor(),
                'text_color' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }
        $data = json_encode($rendezvous);

        return $this->render('pages/index.html.twig', compact('data'));
    }

}