<?php
namespace Nattaponra\OTPGenerator;

use Twilio\Rest\Client;

class TwilioSMS
{

    private $AuthToken;
    private $AccountSid;
    private $client;

    function __construct($config)
    {

        $this->AccountSid     = $config["AccountSid"];
        $this->AuthToken      = $config["AuthToken"];
        $this->MyPhoneNumber  = $config["MyPhoneNumber"];
        $this->client         = new Client($this->AccountSid, $this->AuthToken);

    }

    public function sendSMSOTP($message, $otp_code, $countryCode,$mobileNumber)
    {


        $input = array('from' => $this->MyPhoneNumber,
                       'body' => $message." ".$otp_code);

        $sms   = $this->client->account->messages->create('+'.$countryCode.$mobileNumber,$input);
        return $sms;
   }

}