<?php


namespace nattaponra\LaravelOneTimePassword;


use nattaponra\LaravelOneTimePassword\services\ClickSendSMS;

class ServiceFactory
{
    public function getService($serviceName){

        if ($serviceName == "clicksend") {
            return new ClickSendSMS();
        } else {
            return null;
        }

    }
}