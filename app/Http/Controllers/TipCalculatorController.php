<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipCalculatorController extends Controller
{
    public function index()
    {
        return view('tip_calculator.index');
    }

    public function calculate(Request $request)
    {
        $totalAmount = $request->input('total_amount');
        $tipPercentage = $request->input('tip_percentage');

        $tipAmount = $totalAmount * ($tipPercentage / 100);

        return view('tip_calculator.result', compact('totalAmount', 'tipPercentage', 'tipAmount'));
    }
}
