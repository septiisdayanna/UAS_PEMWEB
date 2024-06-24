@extends('front.layout.template')

@section('title', 'News Portal - Septi Isdayanna')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm" data-aos="fade-in">
                    <a href="{{ url('p/' . $latest_post->seotitle) }}">
                        <img class="card-img-top featured-img" src="{{ asset('storage/back/' . $latest_post->image) }}" alt="..." />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $latest_post->created_at->format('d-m-Y') }}
                            | {{ $latest_post->User->name }}
                            | @foreach ($latest_post->categories as $category)
                                <a href="{{ url('categories/' . $category->seotitle) }}">
                                    {{ $loop->first ? '' : ', ' }}
                                    {{ $category->title }}
                                </a>
                              @endforeach
                        </div>
                        <h2 class="card-title">{{ $latest_post->title }}</h2>
                        <p class="card-text">{{ Str::limit(strip_tags($latest_post->content), 200, '...') }}</p>
                        <a class="btn btn-primary" href="{{ url('p/' . $latest_post->seotitle) }}">Read more →</a>
                    </div>
                </div>

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts as $item)
                        <div class="col-lg-6 mb-4" data-aos="fade-up">
                            <!-- Blog post-->
                            <div class="card h-100">
                                <a href="{{ url('p/' . $item->seotitle) }}">
                                    <img class="card-img-top post-img" src="{{ asset('storage/back/' . $item->image) }}" alt="..." />
                                </a>
                                <div class="card-body flex-column">
                                    <div class="small text-muted mb-2">
                                        {{ $item->created_at->format('d-m-Y') }}
                                        | {{ $item->User->name }}
                                    </div>
                                    <div class="small text-muted mb-2">
                                        @foreach ($item->categories as $category)
                                            <a href="{{ url('categories/' . $category->seotitle) }}" class="text-decoration-none">
                                                {{ $loop->first ? '' : ', ' }}
                                                {{ $category->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                    <h2 class="card-title h4">{{ $item->title }}</h2>
                                    <p class="card-text mb-4">{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
                                    <a class="btn btn-primary" href="{{ url('p/' . $item->seotitle) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination-->
                <div class="d-flex justify-content-center my-4">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
