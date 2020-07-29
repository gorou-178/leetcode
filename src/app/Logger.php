<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * monolog Wrapper
 */
class Logger {

    /** @var string ログディレクトリ */
    const LOG_DIR = '/var/www/html/logs';
    /** @var string ログ名 */
    const APP_LOG = 'appLog';

    /** @var \Monolog\Logger */
    private $logger;

    /**
     * Logger construct
     */
    public function __construct()
    {
        $formatter = new LineFormatter(null, 'Y/m/d H:i:s', true, true);
        $stream = new StreamHandler(self::LOG_DIR . '/app.log', \Monolog\Logger::DEBUG);
        $stream->setFormatter($formatter);
        $this->logger = new \Monolog\Logger(self::APP_LOG);
        $this->logger->pushHandler($stream);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info($message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }
}
