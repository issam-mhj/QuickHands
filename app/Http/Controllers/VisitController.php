<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function home()
    {
        return view("home");
    }
    public function about()
    {
        return view("about");
    }
    public function contact()
    {
        return view("contact");
    }
    public function join()
    {
        return view("auth");
    }
}
