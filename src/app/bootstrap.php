<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

define('APP_LOG', 'appLog');
define('LOG_DIR', '/var/www/html/logs');

ini_set('display_errors', 0);
ini_set('log_errors', 'on');
ini_set('error_log', LOG_DIR . '/error.log');
ini_set('error_reporting', E_ALL);

function getLog()
{
    $formatter = new LineFormatter(null, null, true, true);
    $stream = new StreamHandler(LOG_DIR . '/app.log', Logger::DEBUG);
    $stream->setFormatter($formatter);
    $log = new Logger(APP_LOG);
    $log->pushHandler($stream);
    return $log;
}
