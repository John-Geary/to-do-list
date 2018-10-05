<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Chores</h1>

    @foreach ($chores as $chore)
        <li>{{ $chore->title }}</li>
    @endforeach


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


</body>

</html>
