@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>INVENTORY</h3>
        </div>
    </div>

    <div class="container main">

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif

        <div class="text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn cBtn rounded-0 mt-2 mb-4" data-toggle="modal" data-target="#addItemModal">
                ADD ITEM
            </button>
        </div>

        @if ($products->count() != 0)

            @foreach( $products->chunk(4) as $items )
                <div class="row mb-5">
                    @foreach($items as $item)
                        <div class="col-md-3">
                            <div class="image">
                                <div class="product-count">
                                    <span class="badge badge-dark rounded-0 ml-2">{{ ($item->quantity) ? $item->quantity : 0 }}</span>
                                </div>
                                <div class="edit-delete">
                                    <form id="delete-form-{{ $item->id }}" class="mr-2" method="POST" action="{{ url('/inventory/'.$item->id) }}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" id="delete" style="display: none">delete</button>

                                        <a href="{{ url('/inventory/'.$item->id.'/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="delete-x" cb-data="{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </form>
                                </div>

                                <img src="{{ Storage::url($item->photos) }}" alt="{{ $item->title }}" class="img-fluid">
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


        <!-- Add item Modal -->
        <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0">
                        <span class="modal-title font-weight-bold" id="addItemModalLabel">ADD ITEM</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="font-weight-bold">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/inventory') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $seller }}" id="seller_name_id" name="seller_name_id" >

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} mt-2 mb-2 w-100">
                                <label for="title">Item Name</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }} mt-2 mb-2 w-100">
                                <label for="brand_name">Brand Name</label>
                                <input id="brand_name" type="text" class="form-control" name="brand_name" value="{{ old('brand_name') }}" required>
                                @if ($errors->has('brand_name'))
                                    <span class="help-block text-danger">
                                <strong>{{ $errors->first('brand_name') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-row mt-2 mb-2">

                                <div class="form-group{{ $errors->has('booze_type_id') ? ' has-error' : '' }} col-md-4">
                                    <label for="booze_type_id">Booze Type</label>
                                    <select class="form-control" id="booze_type_id" name="booze_type_id" required>
                                        <option value="">-Select-</option>
                                        @foreach($booze as $item)
                                            <option value="{{ $item->id }}" {{(old('booze_type_id') == $item->id)? 'selected':''}}>{{ $item->type }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('booze_type_id'))
                                        <span class="help-block text-danger">
                                    <strong>{{ $errors->first('booze_type_id') }}</strong>
                                </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} col-md-4">
                                    <label for="price">Price</label>
                                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                                    @if ($errors->has('price'))
                                        <span class="help-block text-danger">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }} col-md-4">
                                    <label for="quantity">Quantity</label>
                                    <input id="quantity" type='number' min='1' max='999' step='1' class="form-control" name="quantity" value="{{ old('quantity') }}" required>
                                    @if ($errors->has('quantity'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} mt-2 mb-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }} mt-2 mb-2">
                                <label for="photo">Photo</label>
                                <input id="photo" type="file" class="form-control" name="photo" required>
                                @if ($errors->has('photo'))
                                    <span class="help-block text-danger">
                                <strong>{{ $errors->first('photo') }}</strong>
                            </span>
                                @endif
                            </div>

                            <hr />

                            <div class="form-group mt-2 mb-2 text-center">
                                <button type="button" class="btn cBtn-dark rounded-0" data-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn cBtn rounded-0">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
