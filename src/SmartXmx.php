<?php

namespace Tunjioye\SmartXmx;

class SmartXmx
{
    public static $username = "";
    public static $password = "";
    public $sender = "";
    public $recipient = [];
    public $message = "";
    public static $response = [
        'OK' => 'Successful',
        '2904' => 'SMS Sending Failed',
        '2905' => 'Invalid username/password combination',
        '2906' => 'Credit exhausted',
        '2907' => 'Gateway unavailable',
        '2908' => 'Invalid schedule date format',
        '2909' => 'Unable to schedule',
        '2910' => 'Username is empty',
        '2911' => 'Password is empty',
        '2912' => 'Recipient is empty',
        '2913' => 'Message is empty',
        '2914' => 'Sender is empty',
        '2915' => 'One or more required fields are empty',
        '2916' => 'Sender ID not allowed'
    ];

    /**
     * SmartXmx
     *
     * @param mixed $username
     * @param mixed $password
     * @return void
     */
    public function __construct($username, $password) {
        self::$username = $username;
        self::$password = $password;
    }

    /**
     * send
     *
     * @param mixed $sender
     * @param mixed $recipient
     * @param mixed $message
     * @return void
     */
    public function sendSms($sender, $recipient, $message) {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->message = $message;

        $recipent_string = '';
        for ($i=0; $i < count($this->recipient); $i++) {
            if ($i == count($this->recipient)-1) {
                $recipent_string .= $this->recipient[$i];
            } else {
                $recipent_string .= $this->recipient[$i].',';
            }
        }

        return SmartXmx::interpretResponse(file_get_contents('http://api.smartsmssolutions.com/smsapi.php?username='.urlencode(self::$username).'&password='.urlencode(self::$password).'&sender='.urlencode($this->sender).'&recipient='.urlencode($recipent_string).'&message='.urlencode($this->message)));
    }

    /**
     * checkSmsBalance
     *
     * @return void
     */
    public static function checkSmsBalance() {
        return SmartXmx::interpretResponse(file_get_contents('http://api.smartsmssolutions.com/smsapi.php?username='.urlencode(self::$username).'&password='.urlencode(self::$password).'&balance=true'));
    }

    /**
     * interpretResponse
     *
     * @param mixed $response
     * @return void
     */
    public static function interpretResponse($response) {
        $response_array = explode(' ', $response);

        if (count($response_array) > 1) {
            return $response_array;
        } else {
            foreach (self::$response as $key => $value) {
                if ($response == $key) {
                    return $value;
                }
            }
        }

        return $response;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the value of sender
     *
     * @return  self
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the value of recipient
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set the value of recipient
     *
     * @return  self
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
