<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function showpage() {
        // Все пожертвования
        $donation = Donations::orderBy('id','desc')->paginate(10);

        // Статистика
        $topDonationName = Donations::sumTopDonation()->name;
        $topDonationSum = Donations::sumTopDonation()->donation;
        $amount = Donations::sum('donation');
        $month = Donations::sumMonth();
        $day = Donations::sumDay();

        // график
        $mounsNow = Donations::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())
            ->sum('donation');

        $mounsNowM = Donations::where('created_at', '>=', \Carbon\Carbon::now()->subMonths(1)->startOfMonth())
            ->where('created_at', '<=', \Carbon\Carbon::now()->startOfMonth())
            ->sum('donation');

        $mounsNowMM = Donations::where('created_at', '>=', \Carbon\Carbon::now()->subMonths(2)->startOfMonth())
            ->where('created_at', '<=', \Carbon\Carbon::now()->subMonths(1)->startOfMonth())
            ->sum('donation');

        return view('general', [
            'donation' => $donation,
            'topDonationName' => $topDonationName,
            'topDonationSum' => $topDonationSum,
            'amount' => $amount,
            'month' => $month,
            'day' => $day,
            'mounsNow' => $mounsNow,
            'mounsNowM' => $mounsNowM,
            'mounsNowMM' => $mounsNowMM
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donations');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Валидация полей
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'donation' => 'required',
            'message' => 'min:3|required',
        ]);

        $create = new Donations();
        $create->name = $request->name;
        $create->email = $request->email;
        $create->donation = $request->donation;
        $create->message = $request->message;
        $create->save();

        return redirect('/')->with('status', 'Add Donations!');
    }
}
