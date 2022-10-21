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
                    <th scope="col">Doctor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($messages as $message)   
                @if($message->user->id == Auth::id()) 
                    <tbody>
                        <tr>
                            <th scope="row">{{ $message->id }}</th>
                            <td>{{ $message->first_name }}</td>
                            <td>{{ $message->last_name }}</td>
                            <td>{{ $message->text }}</td>
                            <td>{{ $message->user->name }}</td>
                            <td>
                                {{-- Show --}}
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-primary mr-2">
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