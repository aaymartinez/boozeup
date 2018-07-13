@extends('layouts.admin')

@section('content')

    <h3>News</h3>

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
            <th scope="col">Booze Type</th>
            <th scope="col">Title</th>
            <th scope="col">Subject</th>
            <th scope="col">Description</th>
            <th scope="col">Date Created</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ Storage::url($row->photo) }}" class="img-fluid "></td>
                <td>{{ $row->booze_type->type }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->subject }}</td>
                <td class="desc">{{ $row->description }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <form action="{{ action('Admin\NewsController@destroy', $row->id) }}" method="post">
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
