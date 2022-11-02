@extends('layouts.app')

@section('additional-scripts')
    <script src="{{ asset('js/stats.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Le tue statistiche</h1>

        <canvas id="myCanvas">

        </canvas>

    </div>
@endsection
