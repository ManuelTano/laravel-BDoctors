@extends('layouts.app')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/doctorhomepage.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="my-3 rounded-lg border border-1 bg-white row">
            <div class="col-4 p-0">
                @if($user->userDetail->thumb)
                <figure class="m-0">
                    <img class="img-fluid" src="{{ $user->userDetail->thumb }}" alt="">
                </figure>
                @endif
            </div>
            <div class="col-8 p-3 d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between">
                    <div>
                        <p><i class="fa-solid fa-user mr-3"></i>{{ $user->getFullName() }}</p>
                        <p><i class="fa-solid fa-house mr-3"></i>{{ $user->address }} , {{ $user->city }}</p>
                    </div>
                    {{-- <div>
                        <i class="fa-solid fa-medal fa-2x {{ $user->sponsorships[0]->business_plan }}-badge"></i>
                    </div> --}}
                </div>
                <div>
                    <address class="d-flex align-items-center justify-content-between">
                        <p><i class="fa-solid fa-envelope mr-3"></i>{{ $user->email }}</p>
                        <p class="@if(!$user->userDetail->phone) d-none @endif">
                            <i class="fa-solid fa-phone mr-3"></i>{{ $user->userDetail->phone }}
                        </p>
                    </address>
                </div>
            </div>
        </div>
    </div>
@endsection
