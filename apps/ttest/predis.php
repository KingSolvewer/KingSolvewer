<?php

use Predis\Client;

require './../../vendor/predis/predis/autoload.php';

$server_option = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 14,
//    'password' => 'jumei2713',
];

$Client = new Client($server_option);
//var_dump($Client);
var_dump($Client->get('app_settings'));






