@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-4">I tuoi messaggi</h1>
    @if(!count($messages))
        <h5 class="text-center my-4">Non ci sono messaggi da visualizzare</h5>
    @else
        <div class="container d-flex flex-wrap align-items-start">
            @foreach ($messages as $message)
                @if ($message->user->id == Auth::id())
                    <div class="card d-flex justify-content-center col-12 mt-5 rounded-pill pl-5" style="width: 21rem;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $message->first_name }} {{ $message->last_name }}</h5>
                                <p class="card-text"><strong>Messaggio:</strong> {{ $message->text }}</p>
                            </div>
                            <div class="mt-5">
                                <p class="card-text"><strong>Data ed orario:</strong> {{ $message->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endsection
