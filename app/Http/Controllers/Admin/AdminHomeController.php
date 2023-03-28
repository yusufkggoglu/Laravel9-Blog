<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\ZendMonitorHandler;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        $data = Setting::first();
        if ($data == null) //if setting table is empty add one record
        {
            $data = new Setting();
            $data->title = 'Project Title';
            $data->save();
            $data = Setting::first();
        }
        return view('admin.setting', [
            'data' => $data
        ]);
    }

    public function settingsUpdate(Request $request)
    {
        $id = $request->input('id');

        $data = Setting::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->smtpserver = $request->input('smtpserver');
        $data->smtpemail = $request->input('smtpemail   ');
        $data->smtppassword = $request->input('smtppassword');
        $data->smtpport = $request->input('smtpport');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->aboutus = $request->input('aboutus');
        $data->contact = $request->input('contact');
        if ($request->file('icon')){
            $data->icon=$request->file('icon')->store('icon');
        }
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('admin_setting');

    }


}