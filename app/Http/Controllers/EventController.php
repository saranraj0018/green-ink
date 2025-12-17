<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventController extends Controller
{
   public function events()
{
    $events = Event::where('status', 1)
        ->orderBy('event_date', 'asc')
        ->get();

    return view('events.main', compact('events'));
}


  public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'required',
        ]);

       $alreadyRegistered = EventRegistration::where('event_id', $request->event_id)
            ->where(function ($q) use ($request) {
                $q->where('email', $request->email)
                ->orWhere('phone', $request->phone);
            })
            ->exists();

    if ($alreadyRegistered) {
        return response()->json([
            'success' => false,
            'message' => '⚠️ You have already registered for this event.'
        ], 409);
    }

    EventRegistration::create([
        'event_id' => $request->event_id,
        'name'     => $request->name,
        'email'    => $request->email,
        'phone'    => $request->phone,
    ]);


        return response()->json([
            'success' => true,
            'message' => 'Registration successful'
        ]);
    }
}
