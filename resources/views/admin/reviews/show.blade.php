@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Recensione</th>
                    <th scope="col">Valutazione</th>
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