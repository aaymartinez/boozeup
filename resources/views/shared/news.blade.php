@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>NEWS</h3>
        </div>
    </div>

    <div class="container main">

        @foreach($news as $item)

            <div class="row mb-3 item pb-3">
                <div class="col-md-3">
                    <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->booze_type->type }}" class="img-fluid">
                </div>
                <div  class="col-md-9 mt-3">

                    <div class="row">
                        <div class="category">{{ $item->booze_type->type }}</div>
                    </div>

                    <div class="row mt-3">
                        <div class="text-danger font-weight-bold">{{ $item->title }} : {{ $item->subject }}</div>
                    </div>

                    <div class="row">
                        <p class="desc text-justify">{{ $item->description }}</p>
                    </div>

                    <div class="row">
                        <a class="text-danger font-weight-bold" href="{{ url('/news/'.$item->id) }}">Read more</a>
                    </div>

                </div>
            </div>

        @endforeach

        <div class="row">
            {{ $news->links() }}
        </div>

    </div>

@endsection
