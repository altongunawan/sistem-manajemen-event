<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        // Get Session from previous Login

        $data = array();
        if(session()->has('loginId')){
            
            $data = User::where('id','=',session()->get('loginId'))->first();
            
            // BACKUP
            // return view('dashboard',[
            //     'data' => $data,
            // ]);

            return view('dashboard', compact('data'));
        }
    }
}
