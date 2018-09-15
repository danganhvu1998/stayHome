<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use User;

class userRequiresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pointInfoTaker(){
        if(Auth::user()->point == null){
            Auth::user()->point = 5;
        }
        return Auth::user()->point;
    }
}
