<?php
namespace nattaponra\LaravelOneTimePassword;

use App\User;

interface ServiceInterface{
   public function sendOneTimePassword(User $user, $otp);
}