<?php
return
    [
        'otp_default_service' => env('OTP_DEFAULT_SMS_SERVICE', 'clickend'),

        'services' => [

            'clickend'=> [
                'username' => env("CLICKSEND_USERNAME",null),
                'api_key'  => env("CLICKSEND_API_KEY",null),
                'sms_from' => env("CLICKSEND_SMS_FROM",null),

            ],

            'twilio'=>[
                'auth_token'       => env("TWILIO_AUTH_TOKEN",null),
                'auth_account_sid' => env("TWILIO_AUTH_ACCOUNT_SID",null),
                'my_phone_number'  => env("TWILIO_MY_PHONE_NUMBER",null),

            ]
        ],

        'opt_reference_number_length'=> 8,

        'opt_digit_length'=> 4,

        'encode_password' => false
    ];

