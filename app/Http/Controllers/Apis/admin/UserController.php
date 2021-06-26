<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;
use App\Traits\ImageTraits;

class UserController extends Controller
{
    use ImageTraits;
    
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        return response()->json([$users],200);
    }

    public function create(UserRequest $req){
        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'image' => $file_name,
            'role' => $req->role,
        ]);
        return response()->json([$user],200);

    }
    
    public function update(UserRequest $req, $id){

        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['the user is not fount !!'],404);
        }
        

        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'image' => $file_name,
            'role' => $req->role,

        ]);

        return response()->json([$user],404);
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['the user is deleted'],200);
    }

}