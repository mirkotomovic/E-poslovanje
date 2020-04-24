<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view("search");
    }
    
    public function about(){
        return view("about");
    }

    public function contacts(){
        return view("contacts");
    }

}
