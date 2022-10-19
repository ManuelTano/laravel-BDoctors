@extends('layouts.app')

@section('content')
<div class="container">
  <header>
    <a href="{{ route('admin.sponsorships.create') }}" class="btn btn-primary">clicca per un nuovo sponsor</a>
    {{-- <a href="{{ route('admin.sponsorships.edit') }}" class="btn btn-danger">clicca per modificare sponsor</a> --}}
  </header>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Business plan</th>
            <th scope="col">Time plan</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
            @foreach($sponsorships as $sponsorship)
                    @if($sponsorship->business_plan != 'basic')
                        <tbody>
                            <tr>
                            <th scope="row">{{ $sponsorship->id }}</th>
                            <td>{{ $sponsorship->business_plan }}</td>
                            <td>{{ $sponsorship->time_plan }}</td>
                            <td>{{ $sponsorship->price }}</td>
                            </tr>
                        </tbody>
                    @endif
            @endforeach
      </table>
</div>
@endsection