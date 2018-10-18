<?php

namespace App\Http\Controllers;

use App\Group;

use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $groups = Group::with('tasks')->get();


        return view('home')->with('groups', $groups);
    }

    public function store()
    {
        $task = new Task;

        $task->name = request('name');
        $task->group_id = request('group');

        $task->save();

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/');
    }

    public function edit()
    {

    }


    public function update()
    {

    }
}
