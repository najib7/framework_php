<?php

namespace App\Controllers;

use App\Models\Event;
use App\Controllers\Controller;
use Psr\Http\Message\ServerRequestInterface;

class EventsController extends Controller
{
    public function index()
    {
        $events = $this->entity->getRepository(Event::class)->findAll();
        return $this->view->load('events/index.html', compact('events'));
    }

    public function create()
    {
        return $this->view->load('events/create.html');
    }

    public function store(ServerRequestInterface $request)
    {
        $request = $request->getParsedBody();
        
        $event = new Event;
        $event->name = $request['name'];
        $event->location = $request['location'];
        $event->price = $request['prix'];
        $event->date = new \Datetime($request['date']);

        $this->entity->persist($event);
        $this->entity->flush();

        return redirect('/events');
    }
}
