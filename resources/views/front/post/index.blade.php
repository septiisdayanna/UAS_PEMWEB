@extends('front.layout.template')

@section('title', 'Posts - Septi Isdayanna')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="mb-3">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Enter search post..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
                </div>
            </form>
        </div>

        @if ($keyword)
            <div class="mb-4">
                <p>Showing post with keyword: <b>{{ $keyword }}</b></p>
                <a href="{{ url('posts') }}" class="btn btn-secondary btn-sm">Reset</a>
            </div>
        @endif

        <div class="row">
            @forelse ($posts as $item)
                <div class="col-md-4 mb-4" data-aos="flip-up">
                    <!-- Blog post-->
                    <div class="card h-100">
                        <div class="ratio ratio-4x3">
                            <a href="{{ url('p/'.$item->seotitle) }}">
                                <img class="card-img-top" src="{{ asset('storage/back/'.$item->image) }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="small text-muted mb-2">{{ $item->created_at->format('d-m-Y') }} | {{ $item->User->name }}</div>
                            <div class="small text-muted mb-2">
                                @foreach($item->categories as $category)
                                    <a href="{{ url('category/'.$category->seotitle) }}" class="text-decoration-none">{{ $category->title }}</a>{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text mb-4">{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
                            <a class="btn btn-primary mt-auto align-self-start" href="{{ url('p/'.$item->seotitle) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">Not found</h3>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
