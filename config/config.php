<?php

error_reporting(E_ALL);

$environment = 'dev';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
