<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Illuminate\Http\Request;

class GeneralController extends Controller

{
    public function showpage() {
        $donation= Donations::paginate(10);
        $one = Donations::orderBy('donation','desc')->first();
        $topDonationName = ucfirst($one->name);
        $topDonationSum = $one->donation;
        $amount= Donations::sum('donation');
        $month = Donations::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->sum('donation');
        $day = Donations::whereDate('created_at', \Carbon\Carbon::today())->sum('donation');


        return view('general', compact('donation', 'topDonationName', 'topDonationSum' , 'amount' , 'month' , 'day'));
    }

    public function tray($one){
        echo $one;
    }
}
