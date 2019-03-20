<?php
    require "..\src\SmartXmx.php";

    use Tunjioye\SmartXmx;

    // Provide Your Smart SMS Solutions LOGIN
    // update username and password below
    $sms = new SmartXmx("username", "password");

    // check Sms Balance
    echo $sms::checkSmsBalance();
?>