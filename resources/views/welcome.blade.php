@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/'
  ]
])


@section('content')
{{--        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('welcome') }}">Welcome</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
                @endif

            <div class="content">
                <div class="title m-b-md">
                  UNMC Health Application
                </div>

                <div class="links">
                    <a href="https://www.unomaha.edu/">University of Nebraska at Omaha</a>
                </div>
            </div>
        </div>--}}

<div class="subject-container">
    More in the future will be here.
</div>

@endsection
