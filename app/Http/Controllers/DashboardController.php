<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function Home(Request $request){
        if($request->isMethod('post') && isset($request->user)){
            $this->Store($request);
            return back()->withInput();
        }
        return view('admin.index');
    }

}