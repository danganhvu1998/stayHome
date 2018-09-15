<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\goods;
use App\market;
use App\singleRequire;

class GoodsController extends Controller
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

    public function goodsViewingSite(){
        $marketsList = $this->maketsListInfoTaker();
        $allGoods = goods::all();
        $data = array(
            "marketsList" => $marketsList,
            "allGoods" => $allGoods
        );
        return view("goodsCtrl.view")->with($data);
    }

    public function goodsBuying(request $request){
        $request->validate([
            'amount' => 'required',
        ]);
        if($request->amount < 1){
            return back()->withError('Amount has to be greater than 0')->withInput();
        } else if($request->amount > 9){
            return back()->withError('Amount has to be smaller than 10')->withInput();
        }
        $singleRequire = new singleRequire;
        $singleRequire->goodsID = $request->goodsID;
        $singleRequire->userID = Auth::user()->id;
        $singleRequire->amount = $request->amount;
        $singleRequire->status = 0;//unconfirmed
        $singleRequire->note = $request->note;
        if(!isset($singleRequire->note)){
            $singleRequire->note = "";
        }
        $singleRequire->save();
        return $request;
    }

    public function goodsAddingSite(){
        $marketsList = $this->maketsListInfoTaker();
        return view("goodsCtrl.add")->with("marketsList", $marketsList);
    }

    public function goodsAdding(request $request){
        $request->validate([
            'goods_name' => 'required',
            'goods_price' => 'required',
            'goods_market_id' => 'required',
            'file' => 'required|image'
        ]);

        $goods = new goods;
        $goods->name = $request->goods_name;
        $goods->price = $request->goods_price;
        $goods->market_id = $request->goods_market_id;

        // Add Cover Image
        $fileNameToStore = 'goods_'.time().'_'.$request->file('file')->getClientOriginalName();
        // Upload File
        $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
        $goods->image =  $fileNameToStore;
        $goods->save();
        return redirect("/goods/view");
    }

    public function goodsEditingSite($goodsID){
        $goods = goods::where("id", $goodsID)->first();
        $marketsList = $this->maketsListInfoTaker();
        $data = array("goods" => $goods, "marketsList" => $marketsList);
        return view("goodsCtrl.edit")->with($data);
    }

    public function goodsEditing(request $request){
        if(Auth::user()->id!=1){
            return redirect("/goods/view");
        }
        $request->validate([
            'goods_name' => 'required',
            'goods_price' => 'required',
            'goods_market_id' => 'required',
            'file' => 'image'
        ]);

        goods::where("id", $request->goodsID)
            ->update([
                "name" => $request->goods_name,
                "price" => $request->goods_price,
                "market_id" => $request->goods_market_id
            ]);
        if($request->hasFile('file')){
            //DELETE EXISTED FILE
            $deleteImage = goods::where("id", $request->goodsID)->first()->image;
            Storage::delete('public/file/'.$deleteImage);

            //ADD NEW FILE
            $fileNameToStore = 'goods_'.time().'_'.$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
            goods::where("id", $request->goodsID)
                ->update(["image" => $fileNameToStore]);
        }
        return redirect("/goods/view");
    }

    public function maketsListInfoTaker(){
        $markets = market::all();
        $marketsList = array();
        foreach($markets as $market){
            $marketID = $market->id;
            $marketsList[$marketID] = $market->name;
        }
        return $marketsList;
    }
}
