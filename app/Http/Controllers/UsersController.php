<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post') && isset($request->user)){
            $this->Store($request);
            return back()->withInput();
        }
        return view('admin.users.list');
    }
    public function Add(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = $this->Store($request);
            return redirect('admin/users/edit/' . $user->id);
        }
        return view('admin.users.add',[
            'edit' => false,
            'title'     => 'Edit New user'
        ]);
    }
    public function Edit($ID, Request $request)
    {
        if ($request->isMethod('post')) {
            $this->Store($request);
        }
        return view('admin.users.add',[
            'edit'      => true,
            'user'      => User::find($ID),
            'title'     => 'Edit user'
        ]);
    }
    private function Store(Request $request){
        if ($request->isMethod('post')) {
            if(isset($request->user['ID'])){
                $user = User::find($request->user['ID']);
            }else{
                $user = new User();
            }
            $user->name         = $request->user['name'];
            $user->email        = $request->user['email'];
            if(isset($request->user['password']) && !empty($request->user['password'])){
                $user->password = Hash::make($request->user['password']);
            }
            $user->save();
            return $user;
        }

        return view('admin.users.add');
    }
    public function Delete($ID){
        User::find($ID)->delete();
        return back();
    }
}
