<?php
/**
 *
 *  Here the whole project is bootstraped and loaded up.
 *
 */
require_once __DIR__ . '/database/Connection.php';
require_once __DIR__ . '/database/MigrateTables.php';
require_once __DIR__ . './../Config.php';
require __DIR__ . '/Container.php';
require __DIR__ . '/Router.php';
require __DIR__ . '/Request.php';

Container::bind('database', (new Connection(Config::sqlite()))->connect());

Router::load('/../routes/web.php')
    ->direct(Request::uri(), Request::method());

(new MigrateTables(Container::get('pdo')))->createTables();
