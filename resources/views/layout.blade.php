<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <title>To Do List</title>
    </head>
    <body>

        @yield('content')

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
        });

        $('#editGroup').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var groupName = button.data('name');
            var group = button.data('group');
            $(this).find('.modal-body input').val(groupName);
            $(this).find('.modal-content form').attr('action', '/groups/' + group);
        });

         $('#editTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var taskName = button.data('name');
            var task = button.data('group');
            $(this).find('.modal-body input').val(taskName);
            $(this).find('.modal-content form').attr('action', '/tasks/' + task);
        });
</script>

    </body>
</html>
