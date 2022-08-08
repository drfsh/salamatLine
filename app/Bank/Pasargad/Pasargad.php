<?php

namespace App\Bank\Pasargad;

use App\Bank\Pasargad\RSAProcessor;
use App\Bank\Pasargad\Parser;

class Pasargad {

    public function __construct(RSAProcessor $rsaProcessor)
    {
        $this->rsaProcessor = $rsaProcessor;
    }

    public function paymentRequest($amount, $redirectAddress = 'localhost', $invoiceNumber = 3)
    {

        $timeStamp = date("Y/m/d H:i:s");
        $invoiceDate = date("Y/m/d H:i:s"); //تاريخ فاكتور
        $action = "1003"; 	// 1003 : براي درخواست خريد
        $data = "#". config('bank.pasargad.mechantCode') ."#";
        $data .= config('bank.pasargad.terminalCode') ."#";
        $data .= $invoiceNumber ."#". $invoiceDate ."#";
        $data .= $amount ."#". $redirectAddress ."#";
        $data .= $action ."#". $timeStamp ."#";

        $data = sha1($data, true);
        $signedData = base64_encode($this->rsaProcessor->sign($data));
        $params = [
            'InvoiceNumber' => $invoiceNumber,
            'InvoiceDate'   => $invoiceDate,
            'Amount'        => $amount,
            'TerminalCode'  => config('bank.pasargad.terminalCode'),
            'MerchantCode'  => config('bank.pasargad.mechantCode'),
            'RedirectAddress' => $redirectAddress,
            'TimeStamp'     => $timeStamp,
            'Action'        => $action,
            'Sign'          => $signedData,
        ];
        return $params;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_REFERER, 'https://prowall.ir/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Sign:' .$signedData,
            'Content-Type: Application/json'
        ));
        curl_setopt($ch, CURLOPT_URL,"https://pep.shaparak.ir/gateway.aspx");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);

    }

    public function getResult($tRef)
    {
        $fields = array('invoiceUID' => $tRef );
        $result = Parser::post2https($fields,'https://pep.shaparak.ir/CheckTransactionResult.aspx');
        $array = Parser::makeXMLTree($result);
        return $array;

    }
    public function verify($invoiceNumber, $invoiceDate, $amount)
    {
        $timeStamp = date("Y/m/d H:i:s");
        $fields = [
            'TerminalCode'  => config('bank.pasargad.terminalCode'),
            'MerchantCode'  => config('bank.pasargad.mechantCode'),
            'InvoiceNumber' => $invoiceNumber,
            'InvoiceDate'   => $invoiceDate,
            'amount'        => $amount,
            'TimeStamp'     => $timeStamp, 	//zamane jari ye system.
            'sign'          => '',
        ];
        $data = "#". $fields['MerchantCode'] ."#". $fields['TerminalCode'] ."#". $fields['InvoiceNumber'] ."#". $fields['InvoiceDate'] ."#". $fields['amount'] ."#". $fields['TimeStamp'] ."#";
        $data = sha1($data, true);
        $fields['sign'] = base64_encode($this->rsaProcessor->sign($data));
        $sendingData =  "MerchantCode=". config('bank.pasargad.mechantCode') ."&TerminalCode=".  config('bank.pasargad.terminalCode') ."&InvoiceNumber=". $invoiceNumber ."&InvoiceDate=". $invoiceDate ."&amount=". $amount ."&TimeStamp=". $timeStamp ."&sign=".$fields['sign'];
        $verifyresult = Parser::post2https($fields,'https://pep.shaparak.ir/VerifyPayment.aspx');
        $array = Parser::makeXMLTree($verifyresult);
        return $array;
    }


}
