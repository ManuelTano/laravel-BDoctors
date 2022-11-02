@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-4"><strong>Le tue recensioni</strong></h1>
        @foreach ($reviews as $review)
            @if ($review->user->id == Auth::id())
                <div class="card col-11 mt-5">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $review->first_name }} {{ $review->last_name }}</h5>
                            <h6 class="card-title">VOTO: {{ $review->rating }}</h6>
                            <p class="card-text">{{ $review->feedback }}</p>
                        </div>
                        <div class="mt-5 d-flex justify-content-between">
                            <p>{{ $review->created_at }}</p>
                            <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-primary mr-2">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
