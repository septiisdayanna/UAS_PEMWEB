@extends('front.layout.template')

@section('title', $post->title . ' - Septi Isdayanna')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('p/' . $post->seotitle) }}">
                        <img class="card-img-top single-img" src="{{ asset('storage/back/' . $post->image) }}"
                            alt="{!! $post->title !!}" />
                    </a>

                    <div class="card-body">
                        <div class="small text-muted">
                          <span class="ml-2">{{ $post->created_at->format('d-m-Y') }}</span>
                          <span class="ml-2">{{ $post->User->name }}</span>
                            @foreach ($post->categories as $category)
                                <span class="ml-2">
                                    <a href="{{ url('categories/'.$post->categories->first()->seotitle) }}">{{ $category->title }}</a>
                                </span>
                            @endforeach
                          <span class="ml-2">{{ $post->hits }} hits</span>
                          <!-- Status Aktif -->
                          @if ($post->active === 'yes')
                            <span class="badge bg-success ml-2">Active</span>
                          @else
                            <span class="badge bg-danger ml-2">Inactive</span>
                          @endif
                        </div>
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <p class="card-text">
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
