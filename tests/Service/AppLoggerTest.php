<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;
use Test\Service\LogFour;
use Test\Service\ThinkLog;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public $type = '';

    public function testInfoLog($type)
    {

        $this->type = $type;
        if($type == 'think'){
            return new ThinkLog();
        }elseif($type == 'logfour'){
            return new LogFour();
        }

        return fale;
    }

    public function info(){

    }

    public function debug(){

    }

    public function error($msg)
    {
       if($this->type == 'think'){
           $msg = strtoupper($msg);
       }

       return $msg;
    }






}