<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExtraController extends ControllerClient
{

    public function getLogout(Request $request)
    {
        $request->session()->forget('name');
        return redirect('');
    }


    public function getIntroduct()
    {
        return view('client.extra.introduction');
    }

    public function getContact()
    {
        return view('client.extra.contact_us');
    }

    public function getTrademark()
    {
        return view('client.extra.trademark');
    }

    public function verifyMail($id, $user, $pass)
    {
        User::where('id', $id)->update([
                'email' => $user
            ]);
        return redirect('')->with('verify-user', $user)->with('verify-pass', $pass);
    }

    public function resetPass($user)
    {
        return redirect('')->with('reset-pass', $user);
    }
}
