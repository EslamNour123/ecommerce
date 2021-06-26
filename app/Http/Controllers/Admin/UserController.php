<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;
use App\Traits\ImageTraits;

class UserController extends Controller
{
    use ImageTraits;

    public function index(Request $req){
        $search = $req->input('search');
        $users = User::orderBy('id','desc')
        ->where('name','LIKE',"%{$search}%")
        ->orWhere('id','LIKE',"%{$search}%")
        ->paginate(10);
        return view('admins.users.index',compact('users','search'));
    }

    public function create_user(){
        return view('admins.users.create_user');
    }

    public function create_user_store(UserRequest $req){
        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $users = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'image' => $file_name,
            'role' => $req->role,
        ]);
        return redirect()->route('index_user')->with('message',Trans('site.create_user_message'));

    }


    public function update_user($id){
        $users = User::findOrFail($id);
        return view('admins.users.update_user',compact('users'));
    }

    public function update_user_store(Request $req, $id){
        $users = $req->validate([
            'role' => 'required'
        ]);

        $users = User::findOrFail($id);
        $users->update($req->all());
        return redirect()->route('index_user')->with('message',Trans('site.update_user_message'));

    }

    public function delete_user($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_user_message'));
    }

    public function profile_admin(){
        $users = User::get()->first();
        return view('admins.users.profile_admin',compact('users'));
    }

    public function update_profile_admin(UserRequest $req, $id){
        $users = User::findOrFail($id);
        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $users->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'image' => $file_name,
            'role' => $req->role,
        ]);
        return redirect()->route('profile_admin')->with('message',Trans('site.update_profile_message'));
    }
}
