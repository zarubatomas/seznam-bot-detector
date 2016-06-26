<?php

namespace TomasZaruba\SeznamBotDetector\Tests;

use \TomasZaruba\SeznamBotDetector\SeznamBotDetector;



class SeznamBotDetectorTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    // tests
    public function testIsSeznamBot()
    {
        $botDetector = new SeznamBotDetector();

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test1; +http://fulltext.sblog.cz/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test2; +http://fulltext.sblog.cz/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (Linux; U; Android 4.1.2; cs-cz; Seznam screenshot-generator Build/Q3) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'));

    }
}
