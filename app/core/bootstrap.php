<?php

namespace App\core;

use App\core\database\Connection as Connection;
use App\core\database\MigrateTables as CreateTable;
use App\Config;
use App\core\Container;
use App\core\{Router,Request};

Router::load('./../routes.php')
->direct(Request::uri(),Request::method());

Container::bind('pdo',(new Connection(Config::sqlite()))->connect());

new CreateTable(Container::get('pdo'));
