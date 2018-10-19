@extends('layout')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="pb-2 mt-4 mb-2 border-bottom d-flex justify-content-between align-items-center text-secondary">
                        <span>To Do List</span>
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createGroup">Create Group</button>
                    </h1>
                    @foreach ($groups as $group)
                    <div class="card mb-4">
                        <div class="bg-secondary text-light d-flex justify-content-between align-items-center" style="padding-right: 20px;">
                            <h5 class="card-header">{{ $group->name }}</h5>
                            <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Edit
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editGroup" data-name="{{ $group->name }}" data-group="{{ $group->id }}">Edit Group</button>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#createTask" data-group="{{ $group->id }}">Add Task</button>
                                    <form method="POST" action="{{ route('groups.destroy', ['id' => $group->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" data-target="#deleteGroup" data-group="{{ $group->id }}">Complete Group</button>
                                        </form>
                            </div>
                            </div>

                        </div>

                        <ul class="list-group list-group-flush">
                            @foreach ($group->tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $task->name }}
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Edit
                                        </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editTask" data-name="{{ $task->name }}" data-group="{{ $task->id }}">Edit Task</button>
                                                    <form method="POST" action="{{ route('tasks.destroy', ['id' => $task->id]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item" data-target="#deleteTask" data-group="{{ $group->id }}">Complete</button>
                                                        </form>
                                            </div>
                                    </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>




@endsection
