<?php

namespace App\Http\Controllers;

use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function List(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->Store($request);
        }
        return view('admin.redirects.list', [
            'edit'  => false
        ]);
    }

    public function Edit($ID, Request $request)
    {
        if ($request->isMethod('post')) {
            $this->store($request);
        }
        $redirect = Redirect::find($ID);
        return view('admin.redirects.list', [
            'redirect'  => $redirect,
            'edit'      => true
        ]);
    }

    public function Delete($ID)
    {
        Redirect::find($ID)->delete();
        return back()->withInput();
    }





    public function Store(Request $request)
    {
        if ($request->isMethod('post')) {
            if(isset($request->redirect['ID'])){
                $redirect   = Redirect::find($request->redirect['ID']);
            }else{
                $redirect   = new Redirect();
            }
            $redirect->from = $request->redirect['from'];
            $redirect->to   = $request->redirect['to'];

            $redirect->save();
            return $redirect;
        }

        return view('admin.redirects.list');
    }
}
