<?php


namespace nattaponra\LaravelOneTimePassword\services;
use App\User;
use ClickSendLib\ClickSendClient;
use nattaponra\LaravelOneTimePassword\ServiceInterface;

class ClickSendSMS implements ServiceInterface
{
    private $username;
    private $api_key;
    public function __construct()
    {
        $this->username = config('otp.services.clicksend.username', "");
        $this->api_key  = config('otp.services.clicksend.api_key', "");
    }

    public function sendOneTimePassword(User $user,$otp)
    {

            if(empty($user->mobile_number)){
                return false;
            }
            $smsMessage[]  = [
                "source"        => "php",
                "from"          => config('otp.services.clicksend.sms_from', ""),
                "body"          => "This is your one-time password ".$otp,
                "to"            =>  $user->mobile_number,
                "custom_string" => "this is a test"
            ];


            try {
                // Prepare ClickSend client.
                $client   = new  ClickSendClient($this->username, $this->api_key);
                $sms      = $client->getSMS();
                $response = $sms->sendSms(['messages' => $smsMessage]);
                return $response;

            } catch(\ClickSendLib\APIException $e) {
                return $e->getResponseBody();
            }



    }
}