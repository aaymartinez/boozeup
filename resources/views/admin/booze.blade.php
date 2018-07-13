@extends('layouts.admin')

@section('content')

    <h3>Booze Types</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

    <form class="form-horizontal w-100" method="POST" action="{{ url('/admin/booze') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} col-md-3">
                <label for="type">Type</label>
                <input id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required>
                @if ($errors->has('type'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }} col-md-3">
                <label for="photo">Photo</label>
                <input id="photo" type="file" class="form-control" name="photo">
                @if ($errors->has('photo'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
                @if ($errors->has('description'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-3">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Date Created</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($booze as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ Storage::url($row->photo) }}" class="img-fluid "></td>
                <td>{{ $row->type }}</td>
                <td class="desc">{{ $row->description }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <form action="{{ action('Admin\BoozeTypesController@destroy', $row->id) }}" method="post">
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
