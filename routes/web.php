<?php


$router->get('/', 'App\Controllers\PagesController::home')->setName('page.home');
$router->get('/about', 'App\Controllers\PagesController::about')->setName('page.about');

// evenets routes
$router->get('/events', 'App\Controllers\EventsController::index')->setName('events.index');
$router->get('/events/create', 'App\Controllers\EventsController::create')->setName('events.create');
$router->post('/events/store', 'App\Controllers\EventsController::store')->setName('events.store');


$router->get('/github', 'App\Controllers\RedirectsController::github')->setName('github');
