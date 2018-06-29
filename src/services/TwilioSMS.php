<?php
namespace nattaponra\LaravelOneTimePassword\services;
use App\User;
use nattaponra\LaravelOneTimePassword\ServiceInterface;
use Twilio\Rest\Client;

class TwilioSMS implements ServiceInterface
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

//    public function sendSMSOTP($message, $otp_code, $countryCode,$mobileNumber)
//    {
//
//
//
//   }

    public function sendOneTimePassword(User $user)
    {
        echo "This is ";
//        $input = array('from' => $this->MyPhoneNumber,
//            'body' => $message." ".$otp_code);
//
//        $sms   = $this->client->account->messages->create('+'.$countryCode.$mobileNumber,$input);
//        return $sms;
    }
}