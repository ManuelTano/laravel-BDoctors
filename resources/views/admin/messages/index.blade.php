@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">I tuoi messaggi</h1>
        <div class="container d-flex flex-wrap align-items-start">
            @foreach ($messages as $message)
            @if ($message->user->id == Auth::id())
            <div class="card d-flex justify-content-center col-12 mt-5 rounded-pill pl-5" style="width: 21rem;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><strong>{{ $message->first_name }} {{ $message->last_name }}</strong></h5>
                            <h6 class="card-title text-muted">{{ $message->email }}</h6>
                        </div>
                        <p class="card-text mt-3"><strong>Messaggio:</strong> {{ $message->text }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="card-text"><strong>Data ed orario:</strong> {{ $message->created_at }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
