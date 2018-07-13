@extends('layouts.admin')

@section('content')

    <h3>Add News</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

    <form class="form-horizontal w-100" method="POST" action="{{ url('/admin/news') }}" enctype="multipart/form-data"  >
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group{{ $errors->has('booze_type_id') ? ' has-error' : '' }}">
                <label for="booze_type_id">Booze Type</label>
                <select class="form-control" id="booze_type_id" name="booze_type_id" required>
                    <option selected>-Select-</option>
                    @foreach($booze as $item)
                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                    @endforeach
                </select>

                @if ($errors->has('booze_type_id'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('booze_type_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                <label for="photo">Photo</label>
                <input id="photo" type="file" class="form-control" name="photo">
                @if ($errors->has('photo'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <label for="subject">Subject</label>
                <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
                @if ($errors->has('subject'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                @if ($errors->has('description'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>


@endsection
