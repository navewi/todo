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
                    <div class="col-md-9">
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
                            <td><a href="{{ route('tasks.edit', ['tasks'=>$storedTask->id]) }}" class='btn button-success link-edit'>Edit</td>
                            <td>
                             <form action="{{ route('tasks.destroy', ['tasks'=>$storedTask->id]) }}" method='POST'>
                                {{csrf_field()}}
                                <input type="hidden" name='_method' value='DELETE'>
                                <input type="submit" class="btn button-danger" value='Delete'>
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
    @endsection
