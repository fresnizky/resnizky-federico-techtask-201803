<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/lunch', function () use ($app) {
  return 'Endpoint works';
});

$app->run();