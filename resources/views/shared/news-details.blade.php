@extends('layouts.app')

@section('content')
    <div class="img-cont d-block w-100">
        <img class="img-fluid w-100" style="background: url('{{ Storage::url($news->photo) }}') no-repeat; background-size: cover;
                background-position: center;">
        <div class="fade-gradient"></div>
        <div class="caption w-100">
            <h2 class="title">{{ $news->title }}</h2>
            <span class="date-created">{{ $news->created_at->format('F d, Y') }}</span>
        </div>
    </div>

    <div class="container main mt-3 mb-5">

        <div class="row mt-3 mb-3">
            <span class="category">{{ $news->booze_type->type }}</span>
        </div>

        <div class="row mt-3">
            <p class="font-weight-bold">{{ $news->subject }}</p>
        </div>

        <div class="row mb-3">
            <p class="desc text-justify">{{ $news->description }}</p>
        </div>

        <div class="row mt-3 mb-3">
            <span class="share font-weight-bold">Share
                <img src="{{ asset('images/icon-fb.png') }}" alt="fb" class="img-fluid">
                <img src="{{ asset('images/icon-twitter.png') }}" alt="twitter" class="img-fluid">
                <img src="{{ asset('images/icon-google.png') }}" alt="google" class="img-fluid">
            </span>
        </div>

    </div>

@endsection
