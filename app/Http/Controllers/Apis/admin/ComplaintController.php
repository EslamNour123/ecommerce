<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index_complaints(){
        $complaints = Complaint::orderBy('id','desc')->paginate(4);
        return response()->json([$complaints],200);
    }

    public function delete_complaints($id){
        $complaints = Complaint::findOrFail($id)->delete();
        return response(['the cpmplaints is deleted'],200);
    }
}
