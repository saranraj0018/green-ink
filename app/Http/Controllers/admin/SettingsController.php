<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
      public function view()
    {
        $prefixes = Setting::where('key', 'student_prefix')->get();
        return view('admin.settings.view', compact('prefixes'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'value' => 'required|string|max:50',
        ]);

        Setting::updateOrCreate(
          ['key' => 'student_prefix'],
          ['value' => $request->value]
        );

        return redirect()->back()->with('success', 'Prefix updated successfully!');
    }
}
