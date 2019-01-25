<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <title>Todo List Application</title>
</head>
<body>
    <div class="container">
        <div class="col-md-offset-2">
            <div class="row">
                <h1> Todo Liste</h1>
            </div>

             @if (Session::has('success'))
                <div class="alert alert-success">
                    <strong>Success:</strong> {{ Session::get('success')}}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>

            @endif

            <form action="{{ route('tasks.store') }}" method='POST'>
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" name='newTaskName' class='form-control'>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class='btn btn-primary btn-block' value='Neuer Eintrag'>
                    </div>
                </div>
            </form>


            @if (!empty($storedTasks))
                <table class="table">
                    <thead>
                        <th>Task #</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>

                        @foreach ($storedTasks as $storedTask)
                        <tr>
                            <th> {{ $storedTask->id }}</th>
                            <td> {{ $storedTask->name }}</td>
                            <td><a href="{{ route('tasks.edit', ['tasks'=>$storedTask->id]) }}" class='btn btn-success'>Edit</td>
                            <td>
                             <form action="{{ route('tasks.destroy', ['tasks'=>$storedTask->id]) }}" method='POST'>
                                {{csrf_field()}}
                                <input type="hidden" name='_method' value='DELETE'>
                                <input type="submit" class="btn btn-danger" value='Delete'>
                             </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            @endif

            <div class="row">
                {{ $storedTasks->links() }}
            </div>

        </div>
    </div>
</body>
</html>
