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
            <h1 class="pb-2 mt-4 mb-2  border-bottom d-flex justify-content-between
            align-items-center text-secondary">
                <span>To Do List</span>
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createGroup">Create Group</button>
            </h1>
                 <div class="card mb-4">
    <div class="bg-secondary text-light d-flex justify-content-between align-items-center">
        <h5 class="card-header">General</h5>
        <button type="button" class="mr-3 btn btn-sm btn-outline-light" data-toggle="modal" data-target="#createTask">Create Task</button>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">Wash car
        <button type="button" class="btn btn-sm btn-primary">Complete</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">Clean desk
        <button type="button" class="btn btn-sm btn-primary">Complete</button>
        </li>
    </ul>
</div>

                <br />

            <div class="card mb-4">
    <div class="bg-secondary text-light d-flex justify-content-between align-items-center">
        <h5 class="card-header">Groceries</h5>
        <button type="button" class="mr-3 btn btn-sm btn-outline-light" data-toggle="modal" data-target="#createTask">Create Task</button>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">Chicken
        <button type="button" class="btn btn-sm btn-primary">Complete</button>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">Milk
        <button type="button" class="btn btn-sm btn-primary">Complete</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">Rice
        <button type="button" class="btn btn-sm btn-primary">Complete</button>
        </li>
    </ul>
</div>

        </div>
    </div>
</div>

<!-- Modal Create Group-->
<div class="modal fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="inputGroup">Name:</label>
      <input class="form-control" id="inputGroup">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL Add Task-->
<div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label for="inputTask">Name:</label>
            <input class="form-control" id="inputTask">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
