@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Immagine</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($details as $detail)    
            <tbody>
                <tr>
                    <th scope="row">{{ $detail->id }}</th>
                    <td>
                        <figure>
                            <img src="{{ asset('storage/' . $detail->thumb) }}" alt="alt" class="img-fluid">
                        </figure>
                    </td>
                    <td>
                        {{-- Show --}}
                        <a href="" class="btn btn-primary mr-2">
                            <i class="fa-solid fa-eye"></i>
                        </a> 
                        {{-- Send Message --}}
                        <a href="" class="btn btn-warning mr-2">
                            <i class="fa-regular fa-message"></i>
                        </a> 
                        {{-- Send Review --}}
                        <a href="" class="btn btn-success mr-2">
                            <i class="fa-regular fa-file-lines"></i>
                        </a> 
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
@endsection