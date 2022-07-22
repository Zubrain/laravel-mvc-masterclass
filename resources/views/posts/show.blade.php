@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on January 1, 2022 by Start Bootstrap</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {{ $post->content }}
                    </section>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/post/{{$post->id}}/edit" class="btn btn-secondary mb-3">Edit Post</a>
                        </div>
                        <div class="col-md-6">
                        <form method="POST" action="/post/{{$post->id}}" class="text-end">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mb-3">
                                Delete Post
                            </button>
                        </form>
                    </div>
                    </div>
                   
                </article>


                <!-- Comments section-->
                {{-- @include('partials.comment') --}}
            </div>



            <!-- Side widgets-->
            @include('partials.sidebar')
        </div>
    </div>
@endsection