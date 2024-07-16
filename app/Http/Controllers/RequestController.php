<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as GxRequest;
class RequestController extends Controller
{
    public function List(Request $request){
        return view('admin.requests.list');
    }
    public function isValidRecaptcha($token){
        $data       = array('secret' => "6Lc224IcAAAAAODOI8NpcB-oq9EZ6LN2XcCgAsJh",'response' => $token);
        $verify     = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        
        $result     = json_decode($response, 1);
        if($result['success']){
            return true;
        }
        return false;
    }
    public function Send(Request $request){
        $contact                        = new GxRequest();
        $contact->form_name             = 'Contact Us';
        $contact->name                  = $request->name;
        $contact->email                 = $request->email;
        $contact->phone                 = $request->phone;
        $contact->country               = $request->country;
        $contact->url                   = $request->url;
        $contact->json                  = json_encode($_POST);
        $contact->note                  = $request->note;
        $contact->save();
    }
}
