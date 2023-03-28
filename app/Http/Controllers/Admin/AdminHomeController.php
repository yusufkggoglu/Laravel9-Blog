<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

}