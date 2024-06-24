@extends('front.layout.template')

@section('title', 'Category '. $category_title . ' - Septi Isdayanna')

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

        <p>Showing post with category: <b>{{ $category_title }}</b></p>

            <div class="row">
                @forelse ($posts as $item)
                    <div class="col-lg-4 mb-4" data-aos="flip-up">
                        <!-- Blog post-->
                        <div class="card h-100">
                            <a href="{{ url('p/'.$item->seotitle) }}"><img class="card-img-top post-img" src="{{ asset('storage/back/'.$item->image) }}" alt="..." /></a>
                            <div class="card-body flex-column">
                                <div class="small text-muted mb-2">{{ $item->created_at->format('d-m-Y') }} |  {{ $item->User->name }} </div>
                                <div class="small text-muted mb-2">
                                   <a href="{{ url('category/'.$item->seotitle) }}"> 
                                    @foreach($item->categories as $category)
                                         {{ $category->title }}
                                    @endforeach
                                    </a>
                                </div>
                                <h2 class="card-title h4">{{ $item->title }}</h2>
                                <p class="card-text mb-4">
                                    {{ Str::limit(strip_tags($item->content), 200, '...')  }}
                                </p>
                                <a class="btn btn-primary" href="{{ url('p/'.$item->seotitle) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @empty
                 <h3>Not found</h3>
                @endforelse
            </div>
            {{ $posts->links() }}
    </div>
@endsection
