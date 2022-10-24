@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Piano d'acquisto</th>
                    <th scope="col">Durata Piano</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($sponsorships as $sponsorship)
                @if ($sponsorship->business_plan != 'basic')
                    <tbody>
                        <tr>
                            <th scope="row">{{ $sponsorship->id }}</th>
                            <td>{{ $sponsorship->business_plan }}</td>
                            <td>{{ $sponsorship->time_plan }}h</td>
                            <td>{{ $sponsorship->price }} &euro;</td>
                            <td><a class="btn btn-primary"
                                    href="{{ route('admin.sponsorships.show', $sponsorship) }}">Visualizza</a></td>
                        </tr>
                    </tbody>
                @endif
            @endforeach
        </table>
    </div>
@endsection
