<?php

namespace App\Http\Controllers;

use App\Models\Marquee;
use Illuminate\Http\Request;

class MarqueeController extends Controller
{
     public static function getActiveMarquee()
    {
        return Marquee::where('status', 1)
            ->latest()
            ->first();
    }
}
