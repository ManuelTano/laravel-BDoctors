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

        <div class="col-12"></div>

        {{-- Curriculum vitae --}}
        <div class="col-6">
            <div class="form-group col-6 d-flex align-items-end justify-content-between">
                <label for="curriculum_vitae" class="d-flex align-items-center h-100 m-0">Curriculum vitae</label>
                <input name="curriculum_vitae" type="file" id="curriculum_vitae" value="{{ old('curriculum_vitae',$details->curriculum_vitae) }}">
            </div>
        </div>

        {{-- Address --}}
        <div class="col-6">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address',$details->address) }}">
            </div>
        </div>

        {{-- Phone --}}
        <div class="col-6">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$details->phone) }}">
            </div>
        </div>

        {{-- thumb --}}
        <div class="col-6">
            <div class="form-group col-6 d-flex align-items-end justify-content-between">
                <label for="thumb" class="d-flex align-items-center h-100 m-0">Thumb</label>
                <input name="thumb" type="file" id="thumb" value="{{ old('thumb',$details->thumb) }}">
            </div>
        </div>

        {{-- City --}}
        <div class="col-6">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city',$details->city) }}">
            </div>
        </div>
        
        {{-- Button to submit form --}}
       <div class="col-12 d-flex">
            <button class="btn btn-success" type="submit">Submit<i class="fa-solid fa-arrow-right ml-2"></i></button>
       </div>
    </form>
</div>
@endsection