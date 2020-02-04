<?php declare(strict_types=1);

require_once __DIR__ . '\..\bootstrap\app.php';


// send the response to the browser
$container->get('emitter')->emit($response);

