@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Doctor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($reviews as $review) 
                @if($review->user->id == Auth::id())   
                    <tbody>
                        <tr>
                            <th scope="row">{{ $review->id }}</th>
                            <td>{{ $review->first_name }}</td>
                            <td>{{ $review->last_name }}</td>
                            <td>{{ $review->feedback }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>
                                {{-- Show --}}
                                <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-primary mr-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a> 
                            </td>
                        </tr>
                    </tbody>
                @endif
            @endforeach
        </table>
    </div>
@endsection