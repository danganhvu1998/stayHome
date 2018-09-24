<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminUsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'checkAdmin']);
    }

    public function allUsersSite(){
        User::whereNull("image")
            ->update([
                    "image" => "cover_default.png"
            ]);
        $users = User::all();
        return view("adminUserCtrl.view")->with("users", $users);
    }

    public function resetUserPassword($userID){
        $newPass = Hash::make(((string)rand(0, 1000000000))."shfWelcome");
        User::where("id", $userID)
            ->update([
                "password" => Hash::make($newPass),
                "remember_token" => $newPass
            ]);
        return back()->withError($newPass);
    }

    public function banUser($userID){
        $newPass = Hash::make(((string)rand(0, 1000000000))."shfWelcome");
        User::where("id", $userID)
            ->update([
                "password" => Hash::make($newPass),
                "remember_token" => $newPass
            ]);
        return back()->withError("Banned!");
    }
}