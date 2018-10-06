<?php

namespace App\Http\Controllers;

use App\Group;

class HomeController extends Controller
{
    public function index()
    {
        $groups = Group::with('tasks')->get();

        return view('home')->with('groups', $groups);
    }
}
