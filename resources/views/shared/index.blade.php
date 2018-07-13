@extends('layouts.app')

@section('content')

    <div class="upper w-100">
        <div id="carouselHP" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselHP" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHP" data-slide-to="1"></li>
                <li data-target="#carouselHP" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item img-container active">
                    <img class="d-block w-100 img-fluid banner1">
                    <div class="fade-gradient"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h4>test 1</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="carousel-item img-container">
                    <img class="d-block w-100 img-fluid banner2">
                    <div class="fade-gradient"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h4>test 2</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="carousel-item img-container">
                    <img class="d-block w-100 img-fluid banner3">
                    <div class="fade-gradient"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h4>test 3</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselHP" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselHP" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="middle container">
        <div class="booze-type mt-5">
            <h4>BOOZE TYPE</h4>
            <div class="row">
                @foreach($booze as $item)
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 mb-4 box">
                        <img src="{{ Storage::url($item->photo) }}" alt="Beers" class="d-block mr-auto ml-auto img-fluid">
                        <div class="overlay"></div>
                        <div class="text">{{ $item->type }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="best-sellers mt-5 mb-5">
            <h4>BEST SELLERS</h4>
            <div class="row">
                @foreach($products as $item)
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
        </div>
    </div>

    <div class="lower w-100 pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <h4 class="mt-3 font-weight-bold">PAYMENT METHODS</h4>
                    <ul class="p-0 mode-of-payment">
                        <li class="cod">Cash On Delivery</li>
                        <li class="maestro">Maestro</li>
                        <li class="master">Mastercard</li>
                        <li class="visa">Visa</li>
                        <li class="Amex">American Express</li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <h4 class="mt-3 font-weight-bold">GET IN TOUCH</h4>
                    <ul>
                        <li class="font-weight-bold">Contact Number</li>
                        <li>0911 354 9874</li>
                    </ul>
                    <ul>
                        <li class="font-weight-bold">Email</li>
                        <li>contact@boozeup.com</li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h4 class="mt-3 font-weight-bold">SUBSCRIBE TO US</h4>
                    <form class="form">
                        <input class="form-control mr-sm-2 mb-1 rounded-0" type="text" placeholder="Your Email Address" aria-label="Search">
                        <button class="btn cBtn form-control my-2 my-sm-0 rounded-0 font-weight-bold" type="submit">SUBSCRIBE</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>




@endsection
