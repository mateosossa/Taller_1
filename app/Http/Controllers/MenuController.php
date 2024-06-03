<?php

namespace App\Http\Controllers;
use App\Models\Event;

class MenuController extends Controller
{
    public function index()
    {
        
        $events = Event::all(); 
        return view('menu', compact('events'));
    }
}


