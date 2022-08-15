@extends('layouts.app')

@section('content')
<!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">The leading news portal for updated gist</p>
            </div>
        </div>
    </header>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->

                

                {{-- <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div> --}}

                @if(count($posts) == 0)
                     <h2>No Posts</h2>
                @endif

              
                <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body row">
                                    <div class="small text-muted col-md-6">{{ $post->created_at->diffForHumans() }}</div>
                                    
                                    @if ($post->comments_count)
                                    <div class="small text-muted col-md-6 text-end">{{ $post->comments_count }} Comments</div>
                                    @else
                                    <div class="small text-muted col-md-6 text-end">{{ 'No comments yet' }}</div>
                                    
                                        @endif
                                
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    @php
                                        if (strlen($post->content) < 45) {
                                        echo "<p class='card-text'>".$post->content."</p>";
                                        } else {              
                                        $new = wordwrap($post->content, 43);
                                        $new = explode("\n", $new);
                                        $new = $new[0] . '...';
                                        echo "<p class='card-text'>".$new."</p>";                 
                                        }
                                    @endphp
                                    <a class="btn btn-primary" href="/post/{{$post->id}}">Read more →</a>
                                </div>
                            </div>              
                        </div>                   
                        @endforeach
                    </div>

                <!-- Pagination-->
                <div class="mt-6 p-4">
                    {{-- {{ $posts->links() }} --}}
                </div>
                {{-- <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav> --}}
            </div>
            <!-- Side widgets-->
            @include('partials.sidebar')
        </div>
    </div>
    

@endsection

