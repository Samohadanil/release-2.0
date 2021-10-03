<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;

    static function sumTopDonation() {
        return Donations::orderBy('donation','desc')->first();
    }

    static function sumMonth() {
        return Donations::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->sum('donation');
    }

    static function sumDay() {
        return Donations::whereDate('created_at', \Carbon\Carbon::today())->sum('donation');
    }

}
