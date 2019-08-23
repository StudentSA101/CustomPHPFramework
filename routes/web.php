<?php 

$router->get('/', 'HomeController@index');

$router->get('/about', 'AboutController@index');

$router->get('/portfolio', 'PortfolioController@index');

$router->get('/contact', 'ContactController@index');

$router->get('/*', 'HomeController@fourOhFour');