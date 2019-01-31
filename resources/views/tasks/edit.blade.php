@extends('layouts.app')

@section('content')

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
            <form class="form-edit" action=" {{ route('tasks.update', [$taskUnderEdit->id]) }}" method='POST'>

            {{ csrf_field() }}
            <input type="hidden" name='_method' value='PUT'>
                        <input type="text" name='updatedTaskName' class='form-control' value=' {{ $taskUnderEdit->name }}'>
                        <input type="date" name='updatedTaskDate' class='form-control' value='<?php echo date('Y-m-d'); ?>'>

                        <input type="submit" value='Speichern' class='btn button-success'>
                        <a href="/tasks" class="btn button-danger pull-right link-goBack">Zurück</a>

            </form>
            </div>
        </div>
    </div>
    @endsection
