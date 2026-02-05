<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function view()
    {
        $events = Event::with('admin')->paginate(10);
        return view('admin.event.view', compact('events'));
    }

    /**
     * Create / Update
     */
    public function save(Request $request)
    {
        // ===== Validation (DB match) =====
        $rules = [
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'event_date'  => 'required|date',
        'start_time'  => 'required',
        'end_time'    => 'required|after:start_time',
        'mode'        => 'required|string|max:255',
        'status'      => 'required|boolean',
        'fee_type'    => 'required|in:free,paid',
        'amount'      => 'nullable|required_if:fee_type,paid|numeric|min:0'
            ];

      if (empty($request->event_id) && empty($request->existing_image)) {
        $rules['event_image'] = 'required|image|mimes:jpg,jpeg,png';
    } elseif ($request->hasFile('event_image')) {
        $rules['event_image'] = 'image|mimes:jpg,jpeg,png';
    }

       $validator = Validator::make($request->all(), $rules);


    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors'  => $validator->errors(),
            'data'    => $request->all(),
        ], 422);
    }

        // ===== Create / Update logic =====
        if (!empty($request->event_id)) {
            $event = Event::find($request->event_id);
            $message = 'Event updated successfully';
        } else {
            $event = new Event();
            $message = 'Event created successfully';
        }

        // ===== Save DB values =====
        $event->title       = $request->title;
        $event->description = $request->description;
        $event->event_date  = $request->event_date;
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;
        $event->mode        = $request->mode;
        $event->status      = $request->status;
        $event->fee_type = $request->fee_type;
        $event->amount   = $request->fee_type === 'paid'
                    ? $request->amount
                    : null;
        $event->admin_id    = Auth::guard('admin')->id();

       if ($request->hasFile('event_image')) {
        $img = time().'_'.$request->event_image->getClientOriginalName();
        $request->event_image->storeAs('events', $img, 'public');
        $event->image = 'events/'.$img;
    } elseif (!empty($request->existing_image)) {
        $event->image = $request->existing_image;
    }

        $event->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'event'   => $event
        ]);
    }

    /**
     * Delete
     */
    public function destroy(Request $request)
    {
        if (!$request->id) {
            return response()->json([
                'success' => false,
                'message' => 'Event ID is required'
            ], 400);
        }

        $event = Event::find($request->id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully'
        ]);
    }

 public function index()
    {
        $registrations = EventRegistration::with('event')
            ->latest()
            ->paginate(10);

        return view('admin.event.registrations', compact('registrations'));
    }

}
