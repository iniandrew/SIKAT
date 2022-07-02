@extends('layouts.skeleton')

@section('app')
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.components.navbar')
        <div class="main-sidebar">
            @include('layouts.components.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        @include('layouts.components.footer')
    </div>
@endsection
