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
            <div class="row">
            <form action=" {{ route('tasks.update', [$taskUnderEdit->id]) }}" method='POST'>

            {{ csrf_field() }}
            <input type="hidden" name='_method' value='PUT'>

                    <div class="form-group">
                        <input type="text" name='updatedTaskName' class='form-control' value=' {{ $taskUnderEdit->name }}'>
                    </div>

                    <div class="form-group">
                        <input type="submit" value='Save Changes' class='btn btn-success'>
                        <a href="" class="btn btn-danger pull-right">Go Back</a>
                    </div>

            </form>
            </div>
        </div>
    </div>
</body>
</html>
