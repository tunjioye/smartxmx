<?php

namespace Tunjioye\SmartXmx\Test;

use PHPUnit_Framework_TestCase;
use Tunjioye\SmartXmx\SmartXmx;

class SmartXmxTest extends PHPUnit_Framework_TestCase {
    /**
     * Test SmartXmx::interpretResponse()
     */
    public function testInterpretResponse() {
        $this->assertEquals('SMS Sending Failed', SmartXmx::interpretResponse('2904'));
    }

    /**
     * Test SmartXmx::checkSmsBalance() returns TRUE if response is numeric
     */
    public function testCheckSmsBalance() {
        $sms = new SmartXmx("username", "password");

        $this->assertTrue(is_numeric($sms->checkSmsBalance()));
    }
}