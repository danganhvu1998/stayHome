<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\market;

class adminMarketsController extends Controller
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

    public function allMarketsSite(){
        $markets = market::all();
        return view("adminMarketCtrl.viewAll")->with("markets", $markets);
    }

    public function addmarketSite(){
        return view("adminMarketCtrl.add");
    }

    public function addMarket(request $request){
        $request->validate([
            'market_name' => 'required',
            'market_address' => 'required',
            'market_postal_code' => 'required',
            'file' => 'required|image'
        ]);
        $market = new market;
        $market->name = $request->market_name;
        $market->address = $request->market_address;
        $market->postal_code = $request->market_postal_code;

        // Add Cover Image
        $fileNameToStore = 'market_'.time().'_'.$request->file('file')->getClientOriginalName();
        // Upload File
        $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
        $market->image =  $fileNameToStore;
        $market->save();
        return redirect('admin/market');
    }

    public function editMarketSite($marketID){
        $market = market::where("id", $marketID)->first();
        return view("adminMarketCtrl.edit")->with("market", $market);
    }

    public function editMarket(request $request){
        $request->validate([
            'market_name' => 'required',
            'market_address' => 'required',
            'market_postal_code' => 'required',
            'file' => 'image'
        ]);

        market::where("id", $request->marketID)
            ->update([
                "name" => $request->market_name,
                "address" => $request->market_address,
                "postal_code" => $request->market_postal_code
            ]);
        if($request->hasFile('file')){
            //DELETE EXISTED FILE
            $deleteImage = market::where("id", $request->marketID)->first()->image;
            Storage::delete('public/file/'.$deleteImage);

            //ADD NEW FILE
            $fileNameToStore = 'market_'.time().'_'.$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
            market::where("id", $request->marketID)
                ->update(["image" => $fileNameToStore]);
        }
        return redirect('admin/market');
    }

    public function deleteMarket($marketID){
        market::where("id", $marketID)->delete();
        return redirect('admin/market');
    }
}
