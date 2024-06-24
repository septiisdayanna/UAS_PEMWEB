@extends('front.layout.template')

@section('title', 'All Category - Septi Isdayanna')

@section('content')
    <!-- Page content-->
    <div class="container">
        <p>Showing post with category</p>

        <div class="row">
            @foreach ($categories as $item)
                <div class="col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="text-center">
                                <span>
                                    <a href="{{ url('categories/'.$item->seotitle) }}" class="text-decoration-none text-dark">
                                        <i class="fas fa-folder fa-5x"></i>
                                    </a>
                                </span>
                                <h5 class="card-title">
                                    <a href="{{ url('categories/'.$item->seotitle) }}" class="text-decoration-none text-dark">
                                        {{ $item->title }} ({{ $item->posts_count }})
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
