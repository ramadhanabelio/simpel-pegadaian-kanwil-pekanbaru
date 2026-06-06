@extends('layouts.base')

@section('body')
    <div class="wrapper">
        @include('layouts.partials.header')

        @include('layouts.partials.sidebar')

        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>

            @include('layouts.partials.footer')
        </div>
    </div>
@endsection
