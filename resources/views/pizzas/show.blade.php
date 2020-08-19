@extends('layouts.layout')
@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                <h2>{{$pizzas['type']}}-{{$pizzas['base']}}</h2>
                <a href="/pizzas/{{$pizzas['id']}}/edit" class="btn btn-info">Edit</a>
                <a href="/pizzas/{{$pizzas['id']}}/delete" class="btn btn-danger">Delete</a>
                </div>

           
            </div>
        </div>
 @endsection
