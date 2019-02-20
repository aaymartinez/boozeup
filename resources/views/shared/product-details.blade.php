@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>PRODUCTS</h3>
        </div>
    </div>

    <div class="container main mt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            {{ $product->rating }}
            <div class="col-md-6 image">
                <img src="{{ Storage::url($product->photos) }}" alt="{{ $product->title }}" class="img-fluid">
            </div>

            <div class="col-md-6">
                <div class="font-weight-bold"><h3>{{ $product->title }}</h3></div>
                <div class="font-weight-bold">
                    <span>{{ $product->brand_name }}</span> | <span>{{ $product->seller_name->shop_name }}</span>
                </div>
                @if( $product->ratings->avg('rating') != '' )
                    <star-rating :rating={{ $product->ratings->avg('rating') }} :read-only=true :show-rating=false :star-size=20 active-color="#93201B"></star-rating>
                @else
                    <star-rating :rating=0 :read-only=true :show-rating=false :star-size=20 active-color="#93201B"></star-rating>
                @endif

                <div class="price-container mt-2 mb-2 font-weight-bold" cs-data="{{ $product->price }}">P <span class="price">{{ number_format($product->price,2) }}</span></div>

                <form class="form-horizontal text-left">
                    {{ csrf_field() }}
                    <input type="hidden" id="price" value="{{ $product->price }}">
                    <input type="hidden" id="user_id" value="{{ $user_id }}">
                    <input type="hidden" id="product_id" value="{{ $product->id }}">

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity" class="font-weight-bold">Quantity</label>
                        <select name="quantity" id="quantity" class="form-control" required>
                            <option value="">-Select-</option>
                            @foreach($qty as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('quantity'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 pl-0">
                            <button type="button" class="btn cBtn w-100 rounded-0" id="cartBtn">ADD TO CART</button>
                        </div>
                        <div class="col-md-6 pr-0">
                            <button type="button" class="btn cBtn w-100 rounded-0" id="wishlistBtn">ADD TO WISHLIST</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3 r-header">
            <h3>Details</h3>
        </div>
        <div class="row mt-3">
            <p>{{ $product->description }}</p>
        </div>

        <div class="row mt-5 justify-content-between r-header">
            <h3>{{ $product->ratings->count() }} Reviews</h3>
            <button type="button" class="btn cBtn rounded-0" data-toggle="modal" data-target="#reviewModal">
                WRITE A REVIEW
            </button>
        </div>
        <div class="mt-3 mb-5">
            @foreach( $product->ratings as $item )
                <div class="d-flex">
                    <h4 class="font-italic d-flex mr-3">{{ $item->title }}</h4>
                    @if( $item->rating != '' )
                        <span><star-rating :rating={{ $item->rating }} :read-only=true :show-rating=false :star-size=20 active-color="#93201B"></star-rating></span>
                    @else
                        <span><star-rating :rating=0 :read-only=true :show-rating=false :star-size=20 active-color="#93201B"></star-rating></span>
                    @endif
                </div>
                <p>{{ $item->description }}</p>
                <hr>
            @endforeach
        </div>
    </div>


    {{-- modal --}}
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">WRITE A REVIEW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ url('/modal/review') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-row mr-0 ml-0">
                            <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }} w-100">
                                <label for="rating" class="font-weight-bold">Rating</label>
                                <star-rating :increment="0.5" :show-rating=true :star-size=20 active-color="#93201B"></star-rating>
                                <input id="rating" type="hidden" class="form-control rounded-0" name="rating" value="{{ old('rating') }}" required>
                                <span class="rating-help-block help-block text-danger">
                                    <strong>Rating is required</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-row mr-0 ml-0">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} w-100">
                                <label for="title" class="font-weight-bold">Title</label>
                                <input id="title" type="text" class="form-control rounded-0" name="title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control rounded-0" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <button type="submit" class="btn cBtn rounded-0 w-100 modal-review-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- alert modal --}}
    <button type="button" class="btn btn-primary alertBtn" data-toggle="modal" data-target=".alert-modal-sm" style="display:none;">alert modal</button>

    <div class="modal fade alert-modal-sm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header cBtn rounded-0">
                    <h6 class="modal-title font-weight-bold">Success</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
@endsection
