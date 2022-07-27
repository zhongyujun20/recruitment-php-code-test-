<?php

namespace App\Service;
use think\facade\Log;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';

    const TYPE_THINK_LOG = 'think-log';

    private $type = '';
    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }elseif($type == self::TYPE_THINK_LOG){
            $this->logger = Log::getFacadeClass();
        }
        $this->type = $type;
    }

    public function info($message = '')
    {
        if($this->type == self::TYPE_THINK_LOG ){
            $message = strtoupper($message);
        }

        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}