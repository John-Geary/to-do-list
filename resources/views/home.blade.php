<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <title>To Do List</title>
    </head>
    <body>

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
                            <button type="button" class="mr-3 btn btn-sm btn-outline-light" data-toggle="modal" data-target="#createTask" data-group="{{ $group->id }}">Create Task</button>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($group->tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $task->name }}</li>
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
                    <form method="POST" action="/">
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

                    <form method="POST" action="/">
                        {{ csrf_field() }}
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

        <script src="{{ asset('/js/app.js') }}"></script>

        <script>
        $('#createTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var group = button.data('group');
            $(this).find('input#group').val(group);
        })
    </script>

    </body>
</html>
