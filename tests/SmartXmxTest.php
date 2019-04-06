<?php

use Tunjioye\SmartXmx;

class SmartXmxTest extends PHPUnit_Framework_TestCase {
    /**
     * Test SmartXmx::checkSmsBalance() returns TRUE if response is numeric
     *
     * @return bool
     */
    public function testCheckSmsBalance() {
        $sms = new SmartXmx("username", "password");

        $this->assertTrue(is_numeric($sms->checkSmsBalance()));
    }
}