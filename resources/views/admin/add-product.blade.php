@extends('layouts.admin')

@section('content')

    <h3>Add Product</h3>

    <form class="form-horizontal" method="POST" action="{{ url('/admin/products') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-row mt-2 mb-2 w-100">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} w-100">
                <label for="title">Item Name</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <span class="help-block text-danger">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-row mt-2 mb-2 w-100">
            <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }} w-100">
                <label for="brand_name">Brand Name</label>
                <input id="brand_name" type="text" class="form-control" name="brand_name" value="{{ old('brand_name') }}" required>
                @if ($errors->has('brand_name'))
                    <span class="help-block text-danger">
                <strong>{{ $errors->first('brand_name') }}</strong>
            </span>
                @endif
            </div>
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

            <div class="form-group{{ $errors->has('seller_name_id') ? ' has-error' : '' }} col-md-4">
                <label for="seller_name_id">Seller Name</label>
                <select class="form-control" id="seller_name_id" name="seller_name_id" required>
                    <option  value="">-Select-</option>
                    @foreach($seller as $item)
                        <option value="{{ $item->id }}" {{(old('seller_name_id') == $item->id)? 'selected':''}}>{{ $item->shop_name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('seller_name_id'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('seller_name_id') }}</strong>
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
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} mt-2 mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
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

        <div class="form-group mt-2 mb-2 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/admin/products') }}" class="btn btn-primary">Cancel</a>
        </div>
    </form>


@endsection
