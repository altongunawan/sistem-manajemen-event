<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class DashboardController extends Controller
{
    public function index(){
        // Get Session from previous Login

        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        
        // return view('dashboard',[
        //     'data' => $data,
        // ]);

        return view('dashboard', compact('data'));

    }
}
