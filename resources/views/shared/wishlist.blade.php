@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>WISHLIST</h3>
        </div>
    </div>

    <div class="container main">

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif

        @if ($wishlist->count() != 0)

            @foreach( $wishlist->chunk(4) as $group )
                <div class="row mb-5 mt-4">
                    @foreach($group as $items)
                        <div class="col-md-3">
                            <div class="image">
                                <div class="edit-delete">
                                    <form id="delete-form-{{ $items->id }}" class="mr-2" method="POST" action="{{ url('/wishlist/'.$items->id) }}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" id="delete" style="display: none">delete</button>

                                        <a class="delete-x" cb-data="{{ $items->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </form>
                                </div>

                                <img src="{{ Storage::url($items->products->photos) }}" alt="{{ $items->products->title }}" class="img-fluid">
                            </div>
                            <div class="title font-weight-bold">{{ $items->products->title }}</div>
                            <div class="prb-row">
                                <div class="price">P {{ $items->price }}</div>
                                @if( $items->products->ratings->avg('rating') != '' )
                                    <star-rating :rating={{ $items->products->ratings->avg('rating') }}
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
                            <div class="form-add-to-cart">
                                <form class="mr-2" method="POST" action="{{ url('/carts') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="user_id" value="{{ $items->users_id }}">
                                    <input type="hidden" id="product_id" value="{{ $items->products_id }}">
                                    <input type="hidden" id="quantity" value="{{ $items->quantity }}">
                                    <input type="hidden" id="price" value="{{ $items->price }}">

                                    <button type="button" id="cart-submit" class="btn cBtn rounded-0 w-100">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        @else
            <div class="row mt-4">
                <p>No item yet.</p>
            </div>
        @endif
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
