@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-4">I tuoi messaggi</h1>
    <div class="container d-flex flex-wrap justify-content-between">
        @foreach ($messages as $message)
            @if ($message->user->id == Auth::id())
                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $message->first_name }} {{ $message->last_name }}</h5>
                        <p class="card-text">{{ $message->text }}</p>
                        <p class="card-text">{{ $message->created_at }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
