<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {


    const URL = "http://some-api.com/user_info";
    private $_logger;
    private $_req;
    public function __construct($logger, HttpRequest $req)
    {
        $this->_logger = $logger;
        $this->_req = $req;
    }

    public function set_req(HttpRequest $req)
    {
        $this->_req = $req;
    }

    public function test_foo1()
    {
        return "bar";
    }

    public function test_get_user_info()
    {
        $result = $this->_req->get(self::URL);
        $result_arr = json_decode($result, true);
        if (in_array('error', $result_arr) && $result_arr['error'] == 0) {
            if (in_array('data', $result_arr)) {
                return $result_arr['data'];
            }
        } else {
            $this->_logger->error("fetch data error.");
        }
        return null;
    }
}