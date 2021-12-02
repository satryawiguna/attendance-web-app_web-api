<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendMailjet extends Controller
{
  public function test()
  {
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "noreplay@smartbiz.id",
            'Name' => "SMARTBIZ"
          ],
          'To' => [
            [
              'Email' => "putupadang13@gmail.com",
            ]
          ],
          'Subject' => "Greetings from Mailjet.",
          'TextPart' => 'Halo halo'
          // 'HTMLPart' => view('emails.content.forgot_password', compact('url', 'email'))->render()
        ]
      ]
    ];

    return $this->callApi($body);
  }

  public function forgotPasswordMail($request, $url)
  {
    $email = $request['email'];
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "noreplay@smartbiz.id",
            'Name' => "SMARTBIZ"
          ],
          'To' => [
            [
              'Email' => $email,
            ]
          ],
          'Subject' => "Smart Attendance Reset Password",
          'HTMLPart' => view('emails.content.forgot_password', compact('url', 'email'))->render()
        ]
      ]
    ];

    return $this->callApi($body);
  }

  public function emailVerification($request, $url)
  {
    $email = $request['email'];
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "noreplay@smartbiz.id",
            'Name' => "SMARTBIZ"
          ],
          'To' => [
            [
              'Email' => $email,
            ]
          ],
          'Subject' => "Smart Attendance Verifikasi Email",
          'HTMLPart' => view('emails.content.email_verification', compact('url'))->render()
        ]
      ]
    ];

    $this->callApi($body);
  }

  public function emailActivation($request)
  {
    $email = $request['email'];
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "noreplay@smartbiz.id",
            'Name' => "SMARTBIZ"
          ],
          'To' => [
            [
              'Email' => $email,
            ]
          ],
          'Subject' => "Smart Attendance Verifikasi Email",
          'HTMLPart' => view('emails.content.activation_account')->render()
        ]
      ]
    ];

    $this->callApi($body);
  }

  public function emailUniqueCode($request, $code, $company, $userName)
  {
    $email = $request['email'];
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "noreplay@smartbiz.id",
            'Name' => "SMARTBIZ"
          ],
          'To' => [
            [
              'Email' => $email,
            ]
          ],
          'Subject' => "Smart Attendance Unique Code",
          'HTMLPart' => view('emails.content.unique_code', compact('code', 'company', 'userName'))->render()
        ]
      ]
    ];

    $this->callApi($body);
  }

  public function callApi($body)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
      $ch,
      CURLOPT_HTTPHEADER,
      array(
        'Content-Type: application/json'
      )
    );
    curl_setopt($ch, CURLOPT_USERPWD, "86c813c35fdce720e6d4bd0ba51ddb55:44f2f305a4df3ce2e3435a208fd8d61f");
    $server_output = curl_exec($ch);
    curl_close($ch);

    return $response = json_decode($server_output, true);
    if ($response->Messages[0]->Status == 'success') {
      echo "Email sent successfully.";
    }
  }
}
