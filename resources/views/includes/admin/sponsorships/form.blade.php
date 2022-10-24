@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('admin.sponsorships.store') }}" method="POST" class="row">
        {{-- Token di convalida --}}
        @csrf
        
        {{-- Business Plan --}}
        <div class="form-group col-6">
            <label for="business_plan">Piani d'acquisto</label>
            <input type="text" class="form-control" id="business_plan" name="business_plan">
        </div>
        
        {{-- Time Plan --}}
        <div class="form-group col-6">
            <label for="business_plan">Durata Piano</label>
            <input type="number" class="form-control" id="time_plan" name="time_plan">
        </div>
        
        {{-- Business Plan --}}
        <div class="form-group col-6">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>

        {{-- Button to submit form --}}
        <div class="col-12">
            <button class="btn btn-success" type="submit">Conferma</button>
        </div>
    </form>
</div>
@endsection