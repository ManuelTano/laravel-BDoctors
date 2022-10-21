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
                </tr>
            </thead>  
            <tbody>
                <tr>
                    <th scope="row">{{ $review->id }}</th>
                    <td>{{ $review->first_name }}</td>
                    <td>{{ $review->last_name }}</td>
                    <td>{{ $review->feedback }}</td>
                    <td>{{ $review->rating }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection