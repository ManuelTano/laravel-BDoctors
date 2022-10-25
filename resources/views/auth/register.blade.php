@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Form Di Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="row">
                        @csrf

                        <div class="col-6">
                            {{-- First Name --}}
                            <div class="form-group">
                                <label for="first_name" class="px-0 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            {{-- Last Name --}}
                            <div class="form-group">
                                <label for="last_name" class="px-0 col-form-label text-md-right">{{ __('Cognome') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name" class="px-0 col-form-label text-md-right">{{ __('Nickname') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div class="form-group">
                                <label for="city" class="col-form-label text-md-right px-0">Città</label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror">
                                @error('city')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- Address --}}
                            <div class="form-group">
                                <label for="address" class="col-form-label text-md-right px-0">{{ __('Indirizzo') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Email address --}}
                            <div class="form-group">
                                <label for="email" class="px-0 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            {{-- Password --}}
                            <div class="form-group">
                                <label for="password" class="px-0 col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password confirmed --}}
                            <div class="form-group">
                                <label for="password-confirm" class="px-0 col-form-label text-md-right">{{ __('Conferma Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        </div>
                            
                        <div class="col-6 row">
                            {{-- Specializzazioni --}}
                            <div class="form-group">
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
                        </div>

                        {{-- Button --}}
                        <div class="col-12 row">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
