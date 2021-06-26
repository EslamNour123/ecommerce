<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index_settings(){
        $setting = Setting::first();        
        return view('admins.settings.index_settings',compact('setting'));
    }

    public function update_settings(){
        $setting = Setting::first();        
        return view('admins.settings.update_settings',compact('setting'));
    }

    public function update_settings_store(SettingRequest $req, $id){
        $settings = Setting::findOrFail($id);
        $settings->update($req->all());
        return redirect()->route('index_settings')->with('message',Trans('site.message_settings'));
    }
    
}
