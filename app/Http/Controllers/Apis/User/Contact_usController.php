<?php

namespace App\Http\Controllers\Apis\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Complaint;

class Contact_usController extends Controller
{
    public function contact_us(Request $req){
        $complaints = $req->validate([
            'content'   => 'required|max:300',
        ]);
        $complaints = Complaint::create([
            'content' => $req->content,
            'user_id' => Auth::user()->id
        ]);
        return response()->json([$complaints],200);
    }
}
