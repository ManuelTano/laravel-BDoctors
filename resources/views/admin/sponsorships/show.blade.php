@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">{{ $sponsorship->id }}</th>
                    <td>{{ $sponsorship->business_plan }}</td>
                    <td>{{ $sponsorship->time_plan }}</td>
                    <td>{{ $sponsorship->price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
