@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Business plan</th>
                    <th scope="col">Time plan</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            @foreach ($sponsorships as $sponsorship)
                @if ($sponsorship->business_plan != 'basic')
                    <tbody>
                        <tr>
                            <th scope="row">{{ $sponsorship->id }}</th>
                            <td>{{ $sponsorship->business_plan }}</td>
                            <td>{{ $sponsorship->time_plan }}</td>
                            <td>{{ $sponsorship->price }}</td>
                            <td><a class="btn btn-primary"
                                    href="{{ route('admin.sponsorships.show', $sponsorship) }}">vedi</a></td>
                        </tr>
                    </tbody>
                @endif
            @endforeach
        </table>
    </div>
@endsection
