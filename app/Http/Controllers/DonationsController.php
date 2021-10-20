<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationsRequest;
use App\Http\Resources\DeskResource;
use App\Models\Donations;
use Carbon\Carbon;
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
        $donationChart = Donations::orderBy('created_at')
            ->get()
            ->groupBy(function($donations) {
                return Carbon::parse($donations->created_at)->format('d.m');
            });

        $chartArray = [];
        array_push($chartArray, ["Month", "Sum"]);

        foreach ($donationChart as $k => $chart) {
            foreach ($chart as $sum) {
                $s =+ $sum->donation;
            }
            array_push($chartArray, [$k, $s]);
        }



        return view('general', [
            'donation' => $donation,
            'topDonationName' => $topDonationName,
            'topDonationSum' => $topDonationSum,
            'amount' => $amount,
            'month' => $month,
            'day' => $day,
            'chartArray' => $chartArray
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
     * @param  \Illuminate\Http\Request\ $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationsRequest $request)
    {
        // Валидация полей
        $request->validated();

        $create = new Donations();
        $create->name = $request->name;
        $create->email = $request->email;
        $create->donation = $request->donation;
        $create->message = $request->message;
        $create->save();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'donation' => $request->donation,
            'msg' => $request->message,
            'date' => Carbon::now()->toDateTimeString()
        ];

        event(new PusherEventController($data));

        return redirect()->back()->with('status', 'Add Donations!');

    }
}
