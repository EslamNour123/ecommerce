<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Models\Complaint;

class Contact_usController extends Controller
{
    public function contact_us(){
        $users = User::get();
        return view('users.contact_us.contact_us',compact('users'));
    }

    public function contact_us_store(Request $req){
        $complaints = $req->validate([
            'content'   => 'required|max:300',
        ]);
        $complaints = Complaint::create([
            'content' => $req->content,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('index')->with('message',Trans('site.complants_message'));
    }
}
