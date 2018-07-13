@extends('layouts.admin')

@section('content')

    <h3>Products</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Seller Name</th>
            <th scope="col">Booze Type</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td><img src="{{ Storage::url($item->photos) }}" class="img-fluid "></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->brand_name }}</td>
                <td>{{ $item->seller_name->shop_name }}</td>
                <td>{{ $item->booze_type->type }}</td>
                <td>{{ $item->price }}</td>
                <td class="desc">{{ $item->description }}</td>
                <td>
                    <form action="{{ action('Admin\ProductsController@destroy', $item->id) }}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
