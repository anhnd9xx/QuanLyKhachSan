<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
//        if (Gate::allows('dashboard-view')){
            return view('backend.dashboard');
//        } else dd('Khong dien thi dc ');

    }
}
