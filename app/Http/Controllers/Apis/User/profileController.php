<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;
use App\Traits\ImageTraits;

class profileController extends Controller
{
    use ImageTraits;
    
    public function update_profile(UserRequest $req, $id){
        $user = User::findOrFail($id);
        $file_name = $this->ImageTraits($req->image,'images_users/users');
        $user->update([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => bcrypt($req->password),
            'phone'    => $req->phone,
            'image'    => $file_name,
        ]);
        return response()->json([$user],200);
        
    }
}
