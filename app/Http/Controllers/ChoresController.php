<?php

namespace App\Http\Controllers;

use App\Chore;

use Illuminate\Http\Request;

class ChoresController extends Controller
{
    public function index()
    {
        $chores = Chore::all();


        return view('welcome', compact('chores'));
    }
}
