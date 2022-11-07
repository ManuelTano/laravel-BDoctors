@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-wrap align-items-start">
        <h1 class="mt-4">Le tue recensioni</h1>
        @foreach ($reviews as $review)
            @if ($review->user->id == Auth::id())
                <div class="card d-flex justify-content-center col-12 mt-5 rounded-pill px-5">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><strong>{{ $review->first_name }} {{ $review->last_name }}</strong></h5>
                            <h6 class="card-title"><strong>Valutazione:</strong> {{ $review->rating }}</h6>
                            <p class="card-text"><strong>Recensione:</strong> {{ $review->feedback }}</p>
                        </div>
                        <div class="mt-5">
                            <p><strong>Data ed orario:</strong> {{ $review->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
