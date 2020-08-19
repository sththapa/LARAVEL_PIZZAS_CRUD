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
                <h1>Edit here</h1>
                @if($errors->any())
                <div class="alert alert-danger container">
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach

                </div>
                @endif
            <form action="/pizzas/{{$pizza['id']}}/updatepizzas" method="POST">
                    @csrf
                    <input type="text" name="type" placeholder="enter type" value="{{$pizza['type']}}">
                <input type="text" name="base" placeholder="enter base" value="{{$pizza['base']}}">
                    <input type="submit" value="submit">
                </form>

           
            </div>
        </div>
 @endsection