@extends('layouts.app')

@section('content')
    <div class="container px-5">
        <h1 class="text-center my-4"><strong>Il mio profilo</strong></h1>
        <div class="my-3 rounded-lg border border-1 bg-white row">
            <div class="col-4 p-0">
                @if ($user->userdetail->thumb)
                    <figure class="m-0">
                        <img class="img-fluid" src="{{ asset('storage/' . $user->userDetail->thumb) }}" alt="">
                    </figure>
                @endif
            </div>
            <div class="col-8 p-3">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3"><strong>{{ $user->name }}</strong></h3>
                    </div>
                    <div class="col-6">
                        <span><i class="fa-solid fa-user mr-2"></i>{{ $user->getFullName() }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 d-flex flex-column justify-content-between">
                        <div class="mt-4">
                            <h5><strong>Luogo:</strong></h5>
                            <p class="mr-4"><i class="fa-solid fa-house mr-2"></i>{{ $user->address }}</p>
                            <p><i class="fa-solid fa-city mr-2"></i>{{ $user->city }}</p>
                        </div>
                        <div class="mt-4">
                            <h5><strong>Contatti:</strong></h5>
                            <address>
                                <p class="mr-4"><i class="fa-solid fa-envelope mr-2"></i>{{ $user->email }}</p>
                                <p class="@if (!$user->userDetail->phone) d-none @endif">
                                    <i class="fa-solid fa-phone mr-2"></i>{{ $user->userDetail->phone }}
                                </p>
                            </address>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <h5><strong>Le tue specializzazioni:</strong></h5>
                        <ul>
                            @forelse($user->specialties as $specialty)
                                <li>{{ $specialty->label }}</li>
                            @empty
                                <li></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
