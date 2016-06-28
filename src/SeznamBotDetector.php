<?php

/*
 * This file is part of the SeznamBotDetect library.
 *
 * (c) Tomas Zaruba <http://github.com/tomaszaruba>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TomasZaruba\SeznamBotDetector;


/**
 * Detect Seznam.cz bots
 * @author Tomáš Záruba <info@tomaszaruba.cz>
 * @package TomasZaruba\SeznamBotDetector
 */
class SeznamBotDetector
{

    /**
     * @var array List of Seznam.cz thumbnail bot ips
     */
    private $thumbnailBotIps = [
        '77.75.73.123',
        '77.75.77.174',
        '77.75.77.200',
        '77.75.79.200',
        '2a02:598:2::1123',
        '2a02:598:2::1200'
    ];

    /**
     * @var array List of Seznam.cz bot identificators
     */
    private $botIdentificators = [
        'SeznamBot',
        'Seznam screenshot-generator'
    ];



    /**
     * Detects Seznam.cz bot for generating thumbnails
     * @return bool
     */
    public function isSeznamThumbnailBot($ip, $userAgent)
    {
        if (!is_string($ip) || !is_string($userAgent)) {
            throw new InvalidArgumentException();
        }

        if (in_array($ip, $this->thumbnailBotIps) && strpos($userAgent, 'Seznam screenshot-generator') !== false) {

            return true;
        } else {

            return false;
        }
    }



    /**
     * Detects Seznam.cz bot for generating thumbnails
     * @return bool
     */
    public function isSeznamBot($ip, $userAgent)
    {
        if (!is_string($ip) || !is_string($userAgent)) {
            throw new InvalidArgumentException();
        }

        foreach ($this->botIdentificators as $identificator) {
            if (strpos($userAgent, $identificator) !== false) {

                return true;
            }
        }

        return false;
    }
}
