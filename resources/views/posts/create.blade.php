@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <form method="POST" action="/posts">
                @csrf
                
                <div class="mb-3">
                    <label for="example-text-input" class="col-form-label">Title</label>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Enter Post Title" id="example-text-input" name="title">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="example-text-input" class="col-form-label">Blog Content</label>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light w-lg mb-3">Create Post</button>
            </form>
        </div>
    </div>

@endsection