<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$app = [];

$app['config'] = require 'config/config.php';
$_ENV = $app['config'];

require 'src/Request.php';
require 'src/Router.php';
require 'src/database/Connection.php';
require 'src/database/QueryBuilder.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);