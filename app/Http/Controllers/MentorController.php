<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
   public function index()
{
    $mentors = [
        [
            'image' => 'assets/mentors/mentor1.png',
            'name' => 'Dr. Sarah Mitchell',
            'title' => 'Senior Software Architect',
            'rating' => '4.9',
            'skills' => ['Web Development', 'DevOps', 'Cloud Computing'],
            'students' => '25,000+',
            'courses' => '8+'
        ],
        [
            'image' => 'assets/mentors/mentor2.png',
            'name' => 'Prof. Emely',
            'title' => 'Research Scientist',
            'rating' => '4.9',
            'skills' => ['Web Development', 'DevOps', 'Cloud Computing'],
            'students' => '29,000+',
            'courses' => '8+'
        ],
        [
            'image' => 'assets/mentors/mentor3.png',
            'name' => 'Prof. Raj Kumar',
            'title' => 'Business Consultant',
            'rating' => '4.9',
            'skills' => ['Leadership', 'Strategy', 'Marketing'],
            'students' => '25,000+',
            'courses' => '8+'
        ],
    ];

    return view('home', compact('mentors'));
}

}
