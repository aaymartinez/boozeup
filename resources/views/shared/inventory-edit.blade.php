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

        <form class="form-horizontal" method="POST" action="{{ url('/inventory/'.$product->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <input type="hidden" value="{{ $product->seller_name_id }}" id="seller_name_id" name="seller_name_id" >

            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} w-100">
                        <label for="title">Item Name</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ (old('title')) ? old('title') : $product->title }}" required>
                        @if ($errors->has('title'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }} w-100">
                        <label for="brand_name">Brand Name</label>
                        <input id="brand_name" type="text" class="form-control" name="brand_name" value="{{ (old('brand_name')) ? old('brand_name') : $product->brand_name }}" required>
                        @if ($errors->has('brand_name'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('brand_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} w-100">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ (old('description')) ? old('description') : $product->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }} w-100">
                        <label for="photo">Photo</label>
                        <div class="d-block">
                            <img src="{{ Storage::url($product->photos) }}" alt="{{ $product->title }}" class="img-fluid mb-2">
                        </div>
                        <input id="photo" type="file" class="form-control" name="photo" value="{{ (old('photos')) ? old('photos') : $product->photos }}">
                        @if ($errors->has('photo'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('photo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('booze_type_id') ? ' has-error' : '' }} w-100">
                        <label for="booze_type_id">Booze Type</label>
                        <select class="form-control" id="booze_type_id" name="booze_type_id" required>
                            <option value="">-Select-</option>
                            @foreach($booze as $item)
                                <option value="{{ $item->id }}" {{ (old('booze_type_id') && old('booze_type_id') == $item->id) ? 'selected' : ( ($product->booze_type_id == $item->id) ? 'selected' : '') }}>{{ $item->type }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('booze_type_id'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('booze_type_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} w-100">
                        <label for="price">Price</label>
                        <input id="price" type="text" class="form-control" name="price" value="{{ (old('price')) ? old('price') : $product->price }}" required>
                        @if ($errors->has('price'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }} w-100">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type='number' min='1' max='999' step='1' class="form-control" name="quantity" value="{{ (old('quantity')) ? old('quantity') : $product->quantity }}" required>
                        @if ($errors->has('quantity'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="form-group mt-2 mb-5 text-center">
                <a href="{{ url('/inventory') }}" class="btn cBtn-dark rounded-0">CANCEL</a>
                <button type="submit" class="btn cBtn rounded-0">SAVE</button>
            </div>
        </form>
    </div>
@endsection
