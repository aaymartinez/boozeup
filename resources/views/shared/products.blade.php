@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>PRODUCTS</h3>
        </div>
    </div>

    <div class="container main">

        @foreach( $products->chunk(4) as $items )
            <div class="row mb-5">
                @foreach($items as $item)
                    <div class="col-md-3">
                        <div class="image">
                            <a href="{{ url('/products/'.$item->id) }}">
                                <img src="{{ Storage::url($item->photos) }}" alt="{{ $item->title }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="title font-weight-bold">{{ $item->title }}</div>
                        <div class="row prb-row">
                            <div class="col">
                                <div class="price">P {{ $item->price }}</div>
                                @if( $item->ratings->avg('rating') != '' )
                                    <star-rating :rating={{ $item->ratings->avg('rating') }}
                                        :read-only=true
                                        :show-rating=false
                                        :star-size=20
                                        active-color="#93201B"></star-rating>
                                @else
                                    <star-rating :rating=0
                                        :read-only=true
                                        :show-rating=false
                                        :star-size=20
                                        active-color="#93201B"></star-rating>
                                @endif

                            </div>
                            <div class="col">
                                <a href="{{ url('/products/'.$item->id) }}" class="btn cBtn rounded-0">BUY NOW</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        @endforeach

    </div>

@endsection
