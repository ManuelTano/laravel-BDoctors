@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('admin.users.update',$user) }}" method="POST" class="row">
        {{-- Token di controllo --}}
        @csrf

        {{-- Change method --}}
        @method('PUT')
        
        {{-- # Fields --}}
        
        {{-- Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        
        {{-- Email --}}
        <div class="col-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        
        {{-- Button to submit form --}}
        <button class="btn btn-success" type="submit">Submit<i class="fa-solid fa-arrow-right ms-2"></i></button>
    </form>
</div>
@endsection