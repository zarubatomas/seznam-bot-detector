<?php

/*
 * This file is part of the SeznamBotDetect library.
 *
 * (c) Tomas Zaruba <http://github.com/tomaszaruba>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TomasZaruba\SeznamBotDetector\Tests;

use \TomasZaruba\SeznamBotDetector\SeznamBotDetector;


/**
 * Unit tests for SeznamBotDetector
 * @author Tomáš Záruba <info@tomaszaruba.cz>
 * @package TomasZaruba\SeznamBotDetector\Tests
 */
class SeznamBotDetectorTest extends \PHPUnit_Framework_TestCase
{



    public function testIsSeznamBot()
    {
        $botDetector = new SeznamBotDetector();

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test1; +http://fulltext.sblog.cz/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test2; +http://fulltext.sblog.cz/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)'));

        $this->assertTrue($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (Linux; U; Android 4.1.2; cs-cz; Seznam screenshot-generator Build/Q3) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'));

        $this->assertFalse($botDetector->isSeznamBot('1.2.3.4', 'Mozilla/5.0 (Linux; U; Android 4.1.2; cs-cz; screenshot-generator Build/Q3) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'));

        $this->assertFalse($botDetector->isSeznamBot('', ''));
    }



    public function testIsSeznamBotExceptionArray()
    {
        $botDetector = new SeznamBotDetector();

        $this->setExpectedException('TomasZaruba\SeznamBotDetector\InvalidArgumentException');

        $botDetector->isSeznamBot(array(), array());
    }



    public function testIsSeznamBotExceptionNull()
    {
        $botDetector = new SeznamBotDetector();

        $this->setExpectedException('TomasZaruba\SeznamBotDetector\InvalidArgumentException');

        $botDetector->isSeznamBot(null, null);
    }



    public function testIsSeznamThumbnailBot()
    {
        $botDetector = new SeznamBotDetector();

        $this->assertFalse($botDetector->isSeznamThumbnailBot('1.2.3.4', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test1; +http://fulltext.sblog.cz/)'));

        $this->assertFalse($botDetector->isSeznamThumbnailBot('1.2.3.4', 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)'));

        $this->assertTrue($botDetector->isSeznamThumbnailBot('77.75.79.200', 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)'));

        $this->assertFalse($botDetector->isSeznamThumbnailBot('77.75.79.200', 'Mozilla/5.0 (compatible; SeznamBot/3.2-test1; +http://fulltext.sblog.cz/)'));

        $this->assertTrue($botDetector->isSeznamThumbnailBot('2a02:598:2::1123', 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)'));

        $this->assertFalse($botDetector->isSeznamThumbnailBot('1.2.3.4', 'Mozilla/5.0 (Linux; U; Android 4.1.2; cs-cz; Seznam screenshot-generator Build/Q3) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'));

        $this->assertFalse($botDetector->isSeznamThumbnailBot('1.2.3.4', 'Mozilla/5.0 (Linux; U; Android 4.1.2; cs-cz; screenshot-generator Build/Q3) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'));

        $this->assertFalse($botDetector->isSeznamThumbnailBot('', ''));
    }



    public function testIsSeznamThumbnailBotExceptionArray()
    {
        $botDetector = new SeznamBotDetector();

        $this->setExpectedException('TomasZaruba\SeznamBotDetector\InvalidArgumentException');

        $botDetector->isSeznamThumbnailBot(array(), array());
    }



    public function testIsSeznamThumbnailBotExceptionNull()
    {
        $botDetector = new SeznamBotDetector();

        $this->setExpectedException('TomasZaruba\SeznamBotDetector\InvalidArgumentException');

        $botDetector->isSeznamThumbnailBot(null, null);
    }
}
