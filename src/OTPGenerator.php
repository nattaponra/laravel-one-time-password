<?php


namespace Nattaponra\OTPGenerator;
use App\OneTimePassword;


/**
 * Created by PhpStorm.
 * User: nattaponrakthong
 * Date: 8/14/2017 AD
 * Time: 4:06 AM
 */


class OTPGenerator
{
    private $otp_message;

    function __construct()
    {
        $this->otp_message="Your verify code is ";
    }


    public function setOtpMessage($message){
        $this->otp_message=$message;
    }

    public function getOtpMessage($message){
        return $this->otp_message;
    }
   public function generateAndSendSMS($countryCode,$mobileNumber){
        $code=$this->generateOTP();
        $this->createOTPRecord($code,"waiting");
        $this->sendSMSOTP($code,$countryCode,$mobileNumber);
   }
    private function generateOTP(){
        $notOverlap = false;
        while(!$notOverlap){
            $code = rand(100000, 999999);

            if(!$this->checkExistOTP($code)){
                $notOverlap = true;
            }
        }
        return $code;
    }
    private function createOTPRecord($code,$status){
        //Save into database.
        $OTP = new OneTimePassword;
        $OTP->otp_code = $code;
        $OTP->status   = $status;
        $OTP->save();
        return $OTP;
    }
    private function checkExistOTP($code){
        $result = OneTimePassword::where("otp_code",$code)
            ->where("status","waiting");
        if($result->count() == 0){
            return false;
        }else{
            return true;
        }
    }


    public function sendSMSOTP($otp_code, $countryCode,$mobileNumber){

         $config = config('services.twilio');
         $twilio  = new TwilioSMS($config);
         $result  = $twilio->sendSMSOTP($this->otp_message, $otp_code, $countryCode,$mobileNumber);
         return $result;
    }

}