@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>BOOZE TYPE</h3>
        </div>
    </div>

    <div class="container main">

        @foreach( $booze->chunk(4) as $items )
            <div class="row mb-5">
                @foreach($items as $item)
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4">
                        <div class="box">
                            <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->type }}" class="d-block mr-auto ml-auto img-fluid">
                            <div class="overlay"></div>
                            <div class="text">{{ $item->type }}</div>
                        </div>
                        <div class="text-center desc pt-2">
                            {{ $item->description }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>

@endsection
