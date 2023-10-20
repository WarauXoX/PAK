@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Image Upload</h2>
        <form action="{{ url('/avatar/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image_path">Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        <hr>

        <h2>Uploaded Images</h2>
        <div class="row">
            @foreach($avatars as $avatar)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{Storage::url(  $avatar->image_path )}}" alt="{{ $avatar->title }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avatar->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
