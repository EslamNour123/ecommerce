<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index_complaints(){
        $complaints = Complaint::orderBy('id','desc')->paginate(4);
        if(isset($_GET['search'])){
            $complaints = Complaint::orderBy('id','desc')->where('id','like','%'.$_GET['search'].'%')->paginate(10);      
        }
        return view('admins.complaints.index_complaints',compact('complaints'));
    }

    public function show_complaints($id){
        $complaints = Complaint::findOrFail($id);
        return view('admins.complaints.show_complaints',compact('complaints'));
    }

    public function delete_complaints($id){
        $complaints = Complaint::findOrFail($id)->delete();
        return redirect()->back()->with('message',Trans('site.delete_message_complants'));
    }
}
