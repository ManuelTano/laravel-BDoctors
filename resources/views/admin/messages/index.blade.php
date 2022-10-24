@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Testo</th>
                    <th scope="col">Dottore</th>
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