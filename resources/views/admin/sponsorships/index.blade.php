@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" align-items-center pt-2">
                <h1 class="my-4">I nostri piani d'acquisto</h1>
            </div>
        </div>
        <div class="row justify-content-between my-5">
            @foreach (config('sponsorships') as $sponsorship)
                @if ($sponsorship['business_plan'] != 'basic')
                    <div class="col-3 card  align-items-center text-center p-0 m-0">
                        <div class="w-100 p-0 m-0 bg-{{ $sponsorship['business_plan'] }}">
                            <h1 class="text-uppercase my-3">{{ $sponsorship['business_plan'] }}</h1>
                        </div>
                        <div class="w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="{{ $sponsorship['color'] }}" fill-opacity="1"
                                    d="M0,64L48,85.3C96,107,192,149,288,144C384,139,480,85,576,69.3C672,53,768,75,864,112C960,149,1056,203,1152,213.3C1248,224,1344,192,1392,176L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="my-3">{{ $sponsorship['time_plan'] }}h</h2>
                        </div>
                        <div>
                            <h2 class="my-3">{{ $sponsorship['price'] }} &euro;</h2>
                        </div>
                        <p class="my-3 mx-3">{{ $sponsorship['description'] }} </p>
                        <div>
                            <a href="" class="btn btn-success mt-4 mb-5">Compra ora</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
