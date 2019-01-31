@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-md-offset-2">
            <div class="row table-title">
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
                <div class="row row-header">
                    <div class="col-md-3">
                        <input type="date" data-date-format="DD MM YYYY" name='newTaskDate' class='form-control' value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name='newTaskName' class='form-control'>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class='btn button-primary btn-block' value='Neuer Eintrag'>
                    </div>
                </div>
            </form>


            @if (!empty($storedTasks))
                <table class="table">
                    <thead>
                        <th>Zu erledigen bis</th>
                        <th class="task-name-column">TODO</th>
                        <th>Editieren</th>
                        <th>Löschen</th>
                    </thead>
                    <tbody>

                        @foreach ($storedTasks as $storedTask)
                        <tr id="table-row-{{$storedTask->id}}">
                            <td> {{ $storedTask->date }}</td>
                            <td> {{ $storedTask->name }}</td>
                            <td><a href="{{ route('tasks.edit', ['tasks'=>$storedTask->id]) }}" class='btn button-success link-edit'>Editieren</td>
                            <td>
                            {!! Form::open(['onsubmit' => 'return false', 'class' => 'deleteButton']) !!}
                            {{Form::hidden('taskId', $storedTask->id, array('class' => 'taskId'))}}
                            {{Form::submit('Delete', ['class' => 'btn button-danger'])}}
                            {!! Form::close() !!}
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
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.deleteButton').click(function(e){
                e.preventDefault();
                $id=$(this).find('.taskId').val();
                $.ajax({
                    type: 'DELETE',
                    url: "{!! url('tasks/delete') !!}" + "/" + $id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $id
                    },
                    success: function(data) {
                        $('#table-row-' + $id).remove();
                    }
                });
            });
        });
    </script>
    @endsection
