@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Projekt: To-Do-Liste
                </div>

                @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
                    <a href="/tasks">Zur To-Do-Liste</a>
                    <a href="https://github.com/navewi/todo">Zum Github dieses Projekt</a>
                    <a href="#">Dokumentation</a>
                </div>
            </div>
        </div>
@endsection
