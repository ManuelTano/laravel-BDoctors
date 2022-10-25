@extends('layouts.app')

@section('additional-scripts')
    <script src="{{ asset('js/edit_profile_form.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <h2 class="my-3">Modifica le tue credenziali</h2>

    <form action="{{ route('admin.users.update') }}" method="POST" class="my-4 p-3 row rounded border border-secondary bg-white" enctype="multipart/form-data" id="submit-edit-credentials" novalidate>
         {{-- Token di controllo --}}
         @csrf

         {{-- Change method --}}
         @method('PUT')
 
         {{-- $ Form credentials --}}

        {{-- First Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="first_name">Nome<span class="mb-2">*</span></label>
                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name',$details->user->first_name) }}">
                @error('first_name')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Last Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="last_name">Cognome<span class="mb-2">*</span></label>
                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name',$details->user->last_name) }}">
                @error('last_name')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="col-6">
            <div class="form-group">
                <label for="email">Email<span class="mb-2">*</span></label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$details->user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Name --}}
        <div class="col-6">
            <div class="form-group">
                <label for="name">Username<span class="mb-2">*</span></label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$details->user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- City --}}
        <div class="col-6">
            <div class="form-group">
                <label for="city">Città<span class="mb-2">*</span></label>
                <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city',$details->user->city) }}">
                @error('address')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Address --}}
        <div class="col-6">
            <div class="form-group">
                <label for="address">Indirizzo<span class="mb-2">*</span></label>
                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address',$details->user->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Specializzazioni --}}
        <div class="form-group col-6">
            <h5>Specializzazioni<span class="mb-2">*</span></h5>
            <div class="form-check mr-3 d-flex flex-wrap">
            @forelse ($specialties as $specialty)
                <div class="col-6">
                    <input 
                    name="specialties[]" 
                    type="checkbox" 
                    class="form-check-input" 
                    id="specialty-{{ $specialty->id }}" 
                    value="{{ $specialty->id }}"
                    @if(in_array($specialty->id,old('specialties',$prev_specialties ?? []))) checked @endif
                    >
                    <label for="specialty-{{ $specialty->label }}" class="form-check-label">{{ $specialty->label }}</label>
                </div>
                @empty
                    <p>-</p>
                @endforelse
            </div>
        </div>

        {{-- Password --}}
        <div class="col-6">
            <div class="form-group">
                <label for="password">Password<span class="mb-2">*</span></label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
        </div>
            
        {{-- Button to submit --}}
        <div class="col-12 d-flex align-items-center justify-content-between">
            <button class="btn btn-success" type="submit">Conferma<i class="fa-solid fa-arrow-right ml-2"></i></button>
            <p class="m-0"><span class="mb-2 mr-2">*</span>Campi obbligatori</p>
       </div>

    </form>

    <h2 class="my-3">Modifica i tuoi dati personali</h2>

    {{-- $ Form ID --}}
    <form action="{{ route('admin.userdetails.update') }}" method="POST" class="my-4 p-3 row rounded border border-secondary bg-white" enctype="multipart/form-data" id="submit-edit-profile" novalidate>
        {{-- Token di controllo --}}
        @csrf

        {{-- Change method --}}
        @method('PUT')

        {{-- $ Form profile --}}

        {{-- Curriculum vitae --}}
        <div class="col-6">
            <div class="form-group">
                <label for="curriculum_vitae" class="flex-shrink-0 h-100 m-0">Curriculum Vitae</label>
                <input name="curriculum_vitae" type="file" id="curriculum_vitae" class="pl-0 border-0 form-control @error('curriculum_vitae') is-invalid @enderror">
                @error('curriculum_vitae')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Phone --}}
        <div class="col-6">
            <div class="form-group">
                <label for="phone">Numero Di Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$details->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- thumb --}}
        <div class="col-6 row">
            <div class="form-group col-6 d-flex flex-column align-items-start justify-content-start">
                <label for="thumb" class="flex-shrink-0 m-0">Immagine</label>
                <input 
                name="thumb" 
                type="file" 
                id="thumb" 
                class="pl-0 border-0 form-control @error('thumb') is-invalid @enderror"
                >
                @error('thumb')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>
        
        {{-- Button to submit form --}}
       <div class="col-12">
            <button class="btn btn-success" type="submit">Conferma<i class="fa-solid fa-arrow-right ml-2"></i></button>
       </div>
    </form>
</div>
@endsection