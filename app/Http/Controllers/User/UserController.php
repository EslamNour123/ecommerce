<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;
use App\Traits\ImageTraits;

class UserController extends Controller
{
    use ImageTraits;

    public function update_profile($id){
        $users = User::findOrFail($id);
        return view('users.profile.update_profile',compact('users'));
    }

    public function settings(UserRequest $req, $id){
        $users = User::findOrFail($id);
        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $users->update([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => bcrypt($req->password),
            'phone'    => $req->phone,
            'image'    => $file_name,
        ]);
        return redirect()->route('index')->with('message',Trans('site.update_profile_message'));
        
    }
}
