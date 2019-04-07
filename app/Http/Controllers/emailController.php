<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class emailController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            Mail::send('email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request) {
                $message->subject("Inovasi SP -".$request->judul);
                $message->from('inovasisp19@gmail.com', '');
                $message->to($request->email."@SEMENINDONESIA.COM");
            });
            return back()->with('alert-success', 'Berhasil Kirim Email');
        } catch (Exception $e) {
            return response(['status' => false, 'errors' => $e->getMessage()]);
        }
    }
}
