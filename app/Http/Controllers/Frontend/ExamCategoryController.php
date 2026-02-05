<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use Illuminate\Http\Request;

class ExamCategoryController extends Controller
{
     public function index()
    {
        $categories = ExamCategory::where('status', 1)->get();
        return view('home.categories', compact('categories'));
    }
}
