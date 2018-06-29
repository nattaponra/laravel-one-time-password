<?php
namespace nattaponra\LaravelOneTimePassword;

interface ServiceInterface{
   public function sendOneTimePassword($user);
}