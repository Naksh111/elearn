<?php

namespace App\Http\Controllers;

use App\Main;
use App\Section;
use App\Categorist;
use App\From;
use App\Course;
use Illuminate\Http\Request;

class HomeControl extends Controller
{
    public function index ( ) {

        $main=Main::first();
       $sections=Section::all();
       $categorists=Categorist::all();
       $courses=Course::all();

        return view('home',[
            'mains'=>$main,
            'sections'=>$sections,
           'categorists'=>$categorists,
            'courses'=>$courses
        ]);
    }

    public function contact (Request $request) {
        $request->validate([
           'name'=>'required',
            'email'=>'required'
        ]);
        $form = new From ();
        $form -> name = request('name');
        $form -> email = request('email');
        $form -> subject = request('subject');
        $form -> message = request('message');
        $form -> save ();
        return view('about');

    }
}
