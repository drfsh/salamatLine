<?php

namespace App\Traits;
use Kavenegar;
// use Log;

trait Smstrait {
    public function Sendsms($phone, $template, $token,$token2,$token3,$token10) {

        try{
            $receptor = $phone;
            $template =  $template;
            $type =  "sms";
            $token =  $token;
            $token2 = $token2;
            $token3 =  $token3;
            $token10 =  $token10;
            $result = Kavenegar::VerifyLookup($receptor,$token,$token2,$token3,$template,$type,$token10);
        }
        catch(ApiException $e){

        }
        catch(HttpException $e){

        }

        // Log::info($phone.' - '.$token);  
    }
}