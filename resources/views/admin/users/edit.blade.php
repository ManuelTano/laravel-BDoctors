@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="my-3">Modofica I Tuoi Dati</h2>

    {{-- $ Form ID --}}
    <form action="{{ route('admin.users.update',$user) }}" method="POST" class="row">
        {{-- Token di controllo --}}
        @csrf

        {{-- Change method --}}
        @method('PUT')
        
        {{-- # Fields --}}
        
        {{-- Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="name">Nickname</label>
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

        {{-- Password --}}
        <div class="col-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center col-12">
            <hr class="my-5 col-6">
        </div>

        <h2 class="my-3 col-12">Modifica Il Tuo Profilo</h2>

        {{-- $ Form info --}}

        <div class="col-12"></div>

        {{-- First Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="first_name">Nome</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
        </div>

        {{-- Last Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="last_name">Cognome</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
        </div>

        {{-- Curriculum vitae --}}
        <div class="col-6">
            <div class="form-group">
                <label for="curriculum_vitae">Curriculum Vitae</label>
                <input type="text" class="form-control" id="curriculum_vitae" name="curriculum_vitae">
            </div>
        </div>

        {{-- Address --}}
        <div class="col-6">
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>

        {{-- Phone --}}
        <div class="col-6">
            <div class="form-group">
                <label for="phone">Numero Di Telefono</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>

        {{-- thumb --}}
        <div class="col-6">
            <div class="form-group">
                <label for="thumb">Immagine</label>
                <input type="text" class="form-control" id="thumb" name="thumb">
            </div>
        </div>

        {{-- City --}}
        <div class="col-6">
            <div class="form-group">
                <label for="city">Città</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
        </div>
        
        {{-- Button to submit form --}}
       <div class="col-12 d-flex">
            <button class="btn btn-success" type="submit">Conferma<i class="fa-solid fa-arrow-right ml-2"></i></button>
       </div>
    </form>
</div>
@endsection