<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PasswordGeneratorController extends Controller
{
    public function index()
    {
        return view('password_generator.index');
    }

    public function generate(Request $request)
    {
        $length = $request->input('length', 12);
        $useUppercase = $request->has('uppercase');
        $useLowercase = $request->has('lowercase');
        $useNumbers = $request->has('numbers');
        $useSymbols = $request->has('symbols');

        $characters = '';
        $characters .= $useUppercase ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        $characters .= $useLowercase ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $characters .= $useNumbers ? '0123456789' : '';
        $characters .= $useSymbols ? '!@#$%^&*()-_+=~`[]{}|;:,.<>?/\\' : '';

        $password = Str::random($length);

        return view('password_generator.result', compact('password'));
    }
}
