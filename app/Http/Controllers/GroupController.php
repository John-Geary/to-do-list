<?php

namespace App\Http\Controllers;

use App\Group;

use App\Task;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('tasks')->get();


        return view('home')->with('groups', $groups);
    }

    public function store()
    {
        $group = new Group;

        $group->name = request('name');

        $group->save();

        return redirect('/');
    }

    public function edit()
    {

    }

    public function update(Group $group)
    {
        $group->name = request('name');

        $group->save();

        return redirect('/');
    }

    public function destroy(Group $group)
    {

        $group->tasks()->delete();
        $group->delete();

        return redirect('/');
    }

}
