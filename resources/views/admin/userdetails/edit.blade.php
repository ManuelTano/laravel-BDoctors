@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="my-3">Edit your credentials</h2>

    {{-- $ Form ID --}}
    <form action="{{ route('admin.userdetails.update') }}" method="POST" class="row" enctype="multipart/form-data">
        {{-- Token di controllo --}}
        @csrf

        {{-- Change method --}}
        @method('PUT')

        {{-- $ Form info --}}

        {{-- Specializzazioni --}}
        <div class="form-group col-6">
            <h5>Specialties</h5>
            @forelse ($specialties as $specialty)
                <label for="specialty-{{ $specialty->label }}" class="mr-4">{{ $specialty->label }}</label>
                <input 
                    name="specialties[]" 
                    type="checkbox" 
                    class="form-check-input" 
                    id="specialty-{{ $specialty->id }}" 
                    value="{{ $specialty->id }}"
                    @if(in_array($specialty->id,old('specialties',$prev_specialties ?? []))) checked @endif
                    >
            @empty
                <p>-</p>
            @endforelse
        </div>

        {{-- Curriculum vitae --}}
        <div class="col-6">
            <div class="form-group col-6 d-flex align-items-end justify-content-between">
                <label for="curriculum_vitae" class="d-flex align-items-center h-100 m-0">Curriculum vitae</label>
                <input name="curriculum_vitae" type="file" id="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" value="{{ old('curriculum_vitae',$details->curriculum_vitae) }}">
                @error('curriculum_vitae')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Address --}}
        <div class="col-6">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address',$details->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Phone --}}
        <div class="col-6">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$details->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- thumb --}}
        <div class="col-6">
            <div class="form-group col-6 d-flex align-items-end justify-content-between">
                <label for="thumb" class="d-flex align-items-center h-100 m-0">Thumb</label>
                <input name="thumb" type="file" id="thumb" value="{{ old('thumb',$details->thumb) }}" class="form-control @error('thumb') is-invalid @enderror">
                @error('thumb')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        {{-- City --}}
        <div class="col-6">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="{{ old('city',$details->city) }}" class="form-control @error('city') is-invalid @enderror">
                @error('city')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>
        
        {{-- Button to submit form --}}
       <div class="col-12 d-flex">
            <button class="btn btn-success" type="submit">Submit<i class="fa-solid fa-arrow-right ml-2"></i></button>
       </div>
    </form>
</div>
@endsection