<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
