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
                        <div class="bg-secondary text-light d-flex justify-content-between align-items-center">
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

        <!-- Modal Create Group-->
        <div class="modal fade" id="createGroup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/groups">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="inputGroup">Name:</label>
                        <input type="text" class="form-control" id="group" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Group</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL Add Task-->
        <div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="/tasks">
                        @csrf
                    <div class="modal-body">
                        <label for="inputTask">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <input type="hidden" id="group" name="group" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

<!-- Edit Group Modal -->
        <div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Group</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="">
                            {{ method_field('PATCH') }}
                            @csrf
                        <div class="modal-body">
                            <label for="inputTask">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <input type="hidden" id="group" name="group" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

<!-- Edit Task Modal -->
<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="">
                    {{ method_field('PATCH') }}
                    @csrf
                <div class="modal-body">
                    <label for="inputTask">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <input type="hidden" id="task" name="task" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                </div>
            </div>
        </div>
    </div>






        <script src="{{ asset('/js/app.js') }}"></script>

        <script>
        $('#createTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var group = button.data('group');
            $(this).find('input#group').val(group);
        })

        $('#editGroup').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var groupName = button.data('name');
            var group = button.data('group');
            $(this).find('.modal-body input').val(groupName);
            $(this).find('.modal-content form').attr('action', '/groups/' + group);
        })

         $('#editTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var taskName = button.data('name');
            var task = button.data('group');
            $(this).find('.modal-body input').val(taskName);
            $(this).find('.modal-content form').attr('action', '/tasks/' + task);
        })
    </script>
@endsection
