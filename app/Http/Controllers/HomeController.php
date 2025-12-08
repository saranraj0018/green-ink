<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        $this->data['categories'] = [
            [
                'title' => 'Development',
                'courses' => '150+ Courses',
                'image' => 'assets/Group 585.png'
            ],
            [
                'title' => 'Business',
                'courses' => '120+ Courses',
                'image' => 'assets/business.png'
            ],
            [
                'title' => 'UI/UX Design',
                'courses' => '90+ Courses',
                'image' => 'assets/design.png'
            ],
        ];

     //  return view('home.main', $this->data);

    }

}
