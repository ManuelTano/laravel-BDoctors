@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">thumb</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($users as $user)    
            <tbody>
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <figure>
                            <img src="{{ asset('storage/' . $user->userDetail->getThumb()) }}" alt="alt" class="img-fluid">
                        </figure>
                    </td>
                    <td>
                        {{-- Show --}}
                        <a href="{{ route('admin.users.show',$user) }}" class="btn btn-primary mr-2">
                            <i class="fa-solid fa-eye"></i>
                        </a> 
                        {{-- Send Message --}}
                        <a href="" class="btn btn-warning mr-2">
                            <i class="fa-regular fa-message"></i>
                            Contact him
                        </a> 
                        {{-- Send Review --}}
                        <a href="" class="btn btn-success mr-2">
                            <i class="fa-regular fa-file-lines"></i>
                            Send feedback
                        </a> 
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
@endsection