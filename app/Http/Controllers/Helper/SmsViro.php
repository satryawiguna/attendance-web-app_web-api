<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsViro extends Controller
{
  public function sendSms($text, $phone)
  {
    $pecah = explode(",", $phone);
    $jumlah = count($pecah);

    $from = "GERAI DAYA";
    $username = "geraidayapremium";
    // $password = "";
    $password = "Ec=ub-|9U0";

    $postUrl = "https://api.smsviro.com/restapi/sms/1/text/advanced";
    for ($i = 0; $i < $jumlah; $i++) {

      if (substr($pecah[$i], 0, 2) == "62" || substr($pecah[$i], 0, 3) == "+62") {
        $pecah = $pecah;
      } elseif (substr($pecah[$i], 0, 1) == "0") {
        $pecah[$i][0] = "X";
        $pecah = str_replace("X", "62", $pecah);
      } else {
        //echo "Invalid mobile number format";
      }
      $destination = array("to" => $pecah[$i]);
      $message     = array(
        "from" => $from,
        "destinations" => $destination,
        "text" => $text,
        "smsCount" => 1
      );
      $postData = array("messages" => array($message));
      $postDataJson = json_encode($postData);

      $ch = curl_init();
      $header = array("Content-Type:application/json", "Accept:application/json");

      curl_setopt($ch, CURLOPT_URL, $postUrl);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
      curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
    }
    return json_decode($response, true);
  }
}
