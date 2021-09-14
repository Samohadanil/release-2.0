<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function test() {
        $andret = Donations::where('id', '>', 2)->get();
        return view('donations', compact('andret'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bestDonor = '111';

        $amountDay = Donations::whereDate('created_at', Carbon::today()
            ->toDateString())
            ->sum('donation');
        $amountMonth = Donations::sum('donation');

        $population = Donations::select(
            DB::raw("year(created_at) as year"),
            DB::raw("SUM(name) as names"),
            DB::raw("SUM(donation) as donations"))
            ->orderBy(DB::raw("YEAR(created_at)"))
            ->groupBy(DB::raw("YEAR(created_at)"))
            ->get();

        $res[] = ['name', 'donation'];
        foreach ($population as $key => $val) {
            $res[++$key] = [$val->name, (int)$val->donation];
        }

        $res = json_encode($res);

        $donations = Donations::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact('donations', 'bestDonor', 'amountDay', 'amountMonth', 'res', 'population'));
    }

}
