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
        'start_time'  => 'required|date_format:H:i:s',
        'end_time'    => 'required|date_format:H:i:s|after:start_time',
        'mode'        => 'required|string|max:255',
        'status'      => 'required|boolean',
        'fee_type'    => 'required|in:free,paid',
        'amount'      => 'nullable|required_if:fee_type,paid|numeric|min:0'
            ];

       $validator = Validator::make($request->all(), $rules);

    // 🔴 HERE IS THE KEY PART
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors'  => $validator->errors(),
            'data'    => $request->all(), // 👈 what actually came
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
