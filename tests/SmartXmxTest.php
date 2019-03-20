<?php
    require "..\src\SmartXmx\SmartXmx.php";

    use SmartXmx\SmartXmx;

    // Smart SMS Solutions LOGIN
    $sms = new SmartXmx("username", "password");

    // check Sms Balance
    echo $sms::checkSmsBalance();

?>