@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-4"><strong>I tuoi messaggi</strong></h1>
    <div class="container d-flex flex-wrap">
        @foreach ($messages as $message)
            @if ($message->user->id == Auth::id())
                <div class="d-flex justify-content-center" style="width: calc(100% / 3)">
                    <div class="card mt-5" style="width: 21rem;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $message->first_name }} {{ $message->last_name }}</h5>
                                <p class="card-text">{{ $message->text }}</p>
                            </div>
                            <div class="mt-5">
                                <p class="card-text">{{ $message->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
