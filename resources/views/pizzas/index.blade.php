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
                <h1>List the Pizzas Order Here</h1>
                @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{session()->get('msg')}}

                    </div>
                @endif
                <div class="container">
                @foreach($pizzas as $pizza)
                <div class="card">
                    <div class="card-title">
                        <h4>{{$pizza['type']}}</h4>

                    </div>
                    <div class="card-body">
                        <h1>{{$pizza['base']}}</h1>

                    </div>
                    <a href="/pizzas/{{$pizza['id']}}" class="btn btn-success">View</a>
                  
                </div>
               
                
                @endforeach
                </div>
                
               
        
                

                </div>

           
            </div>
        </div>

        @endsection
