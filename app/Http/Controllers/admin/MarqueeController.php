<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;

class MarqueeController extends Controller
{
    public function view()
    {
        $marquees = Marquee::paginate(10);
        return view('admin.marquee.view', compact('marquees'));
    }

     public function save(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'status'  => 'required|boolean'
        ]);

        if ($request->marquee_id) {
            $marquee = Marquee::findOrFail($request->marquee_id);
            $message = 'Marquee updated successfully';
        } else {
            $marquee = new Marquee();
            $message = 'Marquee created successfully';
        }

        $marquee->content = $request->content;
        $marquee->status  = $request->status;
        $marquee->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $marquee
        ]);
    }

    public function delete(Request $request)
    {
        $marquee = Marquee::findOrFail($request->marquee_id);
        $marquee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Marquee deleted successfully'
        ]);
    }
}
