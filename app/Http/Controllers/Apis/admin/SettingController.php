<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index_settings(){
        $setting = Setting::get();        
        return response()->json([$setting],200);
    }

    public function update_settings(SettingRequest $req, $id){
        $settings = Setting::findOrFail($id);
        $settings->update($req->all());
        return response()->json([$setting],200);
    }
}
