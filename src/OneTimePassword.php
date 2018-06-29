<?php

namespace nattaponra\LaravelOneTimePassword;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OneTimePassword extends Model
{
     protected $fillable = ["user_id","status"];

     public function oneTimePasswordLogs(){
         return $this->hasMany(OneTimePasswordLog::class,"user_id","user_id");
     }

     public function user(){
         return $this->hasOne(User::class,"id","user_id");
     }

     public function send(){
       return $this->createOTP();
     }

     public function createOTP(){
          return $this->oneTimePasswordLogs()->create([
               'user_id'      => $this->user->id ,
               'otp_code'     => $this->OTPGenerator(),
               'refer_number' => $this->ReferenceNumber(),
               'status'       => 'waiting',
           ]);
     }

     private function ReferenceNumber(){
         $number = strval(rand(10000000,99999999));
         return substr($number,0,config("otp.opt_reference_number_length",4));
     }

     private function OTPGenerator(){
         $number = strval(rand(10000000,99999999));
         return substr($number,0,config("otp.opt_digit_length",4));
     }
}
