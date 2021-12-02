@extends('emails.layout.master')
@section('content')
<td class="content-cell" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
  <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin-top: 0;" align="left">
    Halo {{$email}}!,
  </h1>
  <p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 1.5em; margin-top: 0;" align="left">
    <b>Permohonan reset password telah berhasil kami terima!</b>
  </p>
  <p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 1.5em; margin-top: 0;" align="left">
    Silahkan klik tombol untuk membuat password baru atau copy link yang tertera dibawah.
  </p>
  <table class="purchase" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; padding: 15px;" bgcolor="#F2F4F6">
    <tr>
      <td colspan="2" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;">
        <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
          <tr>
            <td width="30%" class="purchase_item" style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 18px; padding: 10px 0; word-break: break-word;border-bottom: 1px dashed #e3e3e3; text-align: center;">
              <a href="{{$url}}" style="font-weight: bold; font-size: 14px; background-color: #045281;
                border-radius: 10px;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;">
                  Reset Password
              </a>
            </td>
          </tr>
          <tr>
            <td width="30%" class="purchase_item" style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 18px; padding: 10px 0; word-break: break-word;border-bottom: 1px dashed #e3e3e3; text-align: center;">
              <p style="font-weight: bold; font-size: 14px;">{{$url}}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <p style="color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 1.5em; margin-top: 15px;" align="left">
    {{-- Semoga jawaban mimin bisa membantu kamu ya :) --}}
  </p>
</td>
@endsection