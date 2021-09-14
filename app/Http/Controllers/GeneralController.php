<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Illuminate\Http\Request;

class GeneralController extends Controller

{
    public function showpage() {
        $donation= Donations::paginate(2);
        $one = Donations::orderBy('donation','desc')->first();
        $topDonationName = ucfirst($one->name);
        $topDonationSum = $one->donation;
        $amount= Donations::sum('donation');
        $mouns = Donations::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->sum('donation');
        $day = Donations::where('created_at', '=', \Carbon\Carbon::now())->sum('donation');


        return view('general', compact('donation', 'topDonationName', 'topDonationSum' , 'amount' , 'mouns' , 'day'));
    }

    public function tray($one){
        echo $one;
    }
}
