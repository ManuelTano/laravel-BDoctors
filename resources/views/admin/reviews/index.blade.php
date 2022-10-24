@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Recensione</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Dottore</th>
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