@extends('back.layout.template')

@section('title', 'Detail Post - Admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Posts</h1>
        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered" id="dataTable">
                <tr>
                    <th width="250px">Title</th>
                    <td>: {{ $post->title }}</td>
                </tr>
                  <tr>
                    <th>Category</th>
                    <td>:
                        @foreach ($post->categories as $category)
                        {{ $category->title }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td>: {!! $post->content !!}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <a href="{{ asset('storage/back/'.$post->image) }}" target="_blank" rel="nooper noreferrer">
                            <img src="{{ asset('storage/back/'.$post->image) }}" alt="" width="50%">
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Hits</th>
                    <td>: {{ $post->hits }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($post->status == "publish")
                        <td>: <span class="badge bg-success">Published</span></td>
                    @else
                        <td>: <span class="badge bg-danger">Draft</span></td>
                    @endif
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>: {{ $post->created_at }}</td>
                </tr>
                <tr>
                    <th>Update At</th>
                    <td>: {{ $post->updated_at }}</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>: {{ $post->User->name }}</td>
                </tr>
            </table>

            <div class="float-end">
                <a href="{{ url('post') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </main>
@endsection

