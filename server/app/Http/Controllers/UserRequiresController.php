<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\goods;
use App\market;
use App\singleRequire;

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
        if(!isset(Auth::user()->point)){
            User::where("id", Auth::user()->id)
                ->update(["point" => 1000000]);
        }
    }

    public function userRequireConfirmSite(){
        $this->pointInfoTaker();
        $userRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 0)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();

        $confirmedUserRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 1)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();
        
        $takenUserRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 2)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->join("users", "single_requires.takerID", "=", "users.id")
            ->select("goods.*", "single_requires.*", "users.name as user_name", "users.image as user_image", "users.room_number" )
            ->get();
        
        $finishedUserRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 3)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->join("users", "single_requires.takerID", "=", "users.id")
            ->select("goods.*", "single_requires.*", "users.name as user_name", "users.image as user_image", "users.room_number")
            ->get();

        $data = array(
            "userRequires" => $userRequires,
            "confirmedUserRequires" => $confirmedUserRequires,
            "takenUserRequires" => $takenUserRequires,
            "finishedUserRequires" => $finishedUserRequires
        );
        #return $data;
        return view("userRequiresCtrl.confirm")->with($data);
    }

    public function requireDelete($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->status>1) {
            return back()->withError('Order already being taken. Cannot remove!');
        } else if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No Permission!');
        } else if($singleRequire->status==1){
            $this->userAddingPoint($singleRequire->amount);
            #User::where("id", Auth::user()->id)
            #    ->update(["point" => Auth::user()->point+$singleRequire->amount]);
        }
        singleRequire::where("id", $singleRequireID)->delete();
        return redirect("/user_require/confirm");
    }
    
    public function requireConfirm($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->status>0) {
            return back()->withError('Cannot do it!');
        } else if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No Permission!');
        } else if($singleRequire->amount > Auth::user()->point){
            return back()->withError('Not enough points!');
        } else if($singleRequire->amount + $this->currentUsingPoint() > 5){
            return back()->withError('Too many stuffs! Total amout of buying stuffs has to be no greater than 5');
        }
        singleRequire::where("id", $singleRequireID)
            ->update(["status" => 1]);
        $this->userAddingPoint(-$singleRequire->amount);
        #User::where("id", Auth::user()->id)
        #    ->update(["point" => Auth::user()->point-$singleRequire->amount]);
        return redirect("/user_require/confirm");
    }

    public function requiresConfirmAll(){
        $notCfedPoint = $this->totalNotConfirmedPoints();
        $currentUsingPoint = $this->currentUsingPoint();
        $totalPoint = $notCfedPoint + $currentUsingPoint;
        if( $notCfedPoint > Auth::user()->point){
            return back()->withError('Not enough points!');
        } elseif ($totalPoint>5 ){
            return back()->withError('Too many stuffs! Total amout of buying stuffs has to be no greater than 5');
        }
        singleRequire::where("userID", Auth::user()->id)
            ->where("status", 0)
            ->update([
                "status" => 1
            ]);
        $this->userAddingPoint(-$notCfedPoint);
        #User::where("id", Auth::user()->id)
        #    ->update(["point" => Auth::user()->point-$notCfedPoint]);
        return redirect("/user_require/confirm");
    }

    public function requiresConfirmFinishedSuccess($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No permission! Dont try to hack this!');
        } else if($singleRequire->status != 3){
            return back()->withError('What the ...');
        }
        singleRequire::where("id", $singleRequireID)->update(["status" => 4]);
        $this->userAddingPoint($singleRequire->amount, $singleRequire->takerID);
        return redirect("/user_require/confirm");
    }

    public function requiresConfirmFinishedFailt($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No permission! Dont try to hack this!');
        } else if($singleRequire->status != 3){
            return back()->withError('What the ...');
        }
        singleRequire::where("id", $singleRequireID)->update(["status" => 5]);
        $this->userAddingPoint($singleRequire->amount);
        return redirect("/user_require/confirm");
    }

    public function requiresConfirmFinishedHistory(){
        $userFinishedSingleRequires = singleRequire::where("userID", Auth::user()->id)
            ->orderBy("single_requires.id", "desc")
            ->where("status", ">", 3)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->join("users", "single_requires.takerID", "=", "users.id")
            ->select("goods.*", "single_requires.*", "users.name as user_name", "users.image as user_image", "users.room_number")
            ->limit(12)
            ->get();

        $usersFinishedTakenRequires = singleRequire::where("takerID", Auth::user()->id)
            ->orderBy("single_requires.id", "desc")
            ->where("status", ">", 3)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->join("users", "single_requires.userID", "=", "users.id")
            ->select("goods.*", "single_requires.*", "users.name as user_name", "users.image as user_image", "users.room_number")
            ->limit(12)
            ->get();
        $data = array("userFinishedSingleRequires" => $userFinishedSingleRequires, "usersFinishedTakenRequires" => $usersFinishedTakenRequires);
        return view("userRequiresCtrl.history")->with($data);
    }

    public function currentUsingPoint(){
        $currentBuyingGoods = singleRequire::where("userID", Auth::user()->id)
            ->orderBy("single_requires.id", "desc")
            ->where("status", "<", 4)
            ->where("status", ">", 0)
            ->select("amount")
            ->get();
        $usingPoint = 0;
        foreach($currentBuyingGoods as $goods) {
            $usingPoint += $goods->amount;
        }
        return $usingPoint;
    }

    public function totalNotConfirmedPoints(){
        $currentBuyingGoods = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 0)
            ->select("amount")
            ->get();
        $usingPoint = 0;
        foreach($currentBuyingGoods as $goods) {
            $usingPoint += $goods->amount;
        }
        return $usingPoint;
    }

    public function userAddingPoint($addPoint, $userID = 0){
        if($userID == 0) $userID = Auth::user()->id;
        User::where("id", $userID)
            ->update(["point" => Auth::user()->point+$addPoint]);
    }
}
