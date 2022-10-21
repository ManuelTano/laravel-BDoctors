@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Text</th>
                    <th scope="col">Email</th>
                    <th scope="col">Doctor</th>
                </tr>
            </thead>   
            <tbody>
                <tr>
                    <th scope="row">{{ $message->id }}</th>
                    <td>{{ $message->first_name }}</td>
                    <td>{{ $message->last_name }}</td>
                    <td>{{ $message->text }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->user->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection