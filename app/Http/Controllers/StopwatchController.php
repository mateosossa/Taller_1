<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stopwatch;

class StopwatchController extends Controller
{
    public function index()
    {
        $stopwatch = Stopwatch::firstOrCreate([], ['running' => false]);
        return view('stopwatch.index', compact('stopwatch'));
    }

    public function start()
    {
        $stopwatch = Stopwatch::first();
        $stopwatch->started_at = now();
        $stopwatch->running = true;
        $stopwatch->save();
        
        return redirect()->route('stopwatch.index');
    }

    public function pause()
    {
        $stopwatch = Stopwatch::first();
        $stopwatch->paused_at = now();
        $stopwatch->running = false;
        $stopwatch->save();
        
        return redirect()->route('stopwatch.index');
    }

    public function reset()
    {
        $stopwatch = Stopwatch::first();
        $stopwatch->started_at = null;
        $stopwatch->paused_at = null;
        $stopwatch->running = false;
        $stopwatch->save();
        
        return redirect()->route('stopwatch.index');
    }
}
