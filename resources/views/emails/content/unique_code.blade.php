@extends('emails.layout.master')
@section('content')
<td class="content-cell" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;">
  <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin-top: 0;" align="left">
    Halo,
  </h1>
  <p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 1.5em; margin-top: 0;" align="left">
    Hi, {{$userName}} Anda telah terdaftar sebagai employee dari perusahaan {{$company}}, masukkan kode unik dibawah ini saat melakukan registrasi di aplikasi smart attendance.
  </p>
  <table class="purchase" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; padding: 15px;" bgcolor="#F2F4F6">
    <tr>
      <td colspan="2" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;">
        <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
          <tr>
            <td width="30%" class="purchase_item" style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; line-height: 18px; padding: 10px 0; word-break: break-word;border-bottom: 1px dashed #e3e3e3; text-align: center;">
              <p style="font-size: 24px; font-weight: bold">{{$code}}</p>
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