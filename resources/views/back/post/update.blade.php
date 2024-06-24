@extends('back.layout.template')

@section('title', 'Update Post - Admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> Create Posts</h1>
        </div>

        <div class="mt-3">

            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif


            <form action="{{ url('post/'.$post->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="oldImage" value="{{ $post->image }}">

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $post->title) }}">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category">Select Category</label>
                            <select multiple name="categories[]" id="category" data-search="false" data-silent-initial-value-set="true">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ $post->categories->contains($item->id) ? 'selected' : '' }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea name="content" id="myeditor" cols="30" rows="10" class="form-control">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image(Max 2MB)</label>
                    <input type="file" name="image" id="image" cols="30" rows="10" class="form-control">
                    <div class="mt-1">
                        <small>Gambar Lama</small><br>
                        <img src="{{ asset('storage/back/'.$post->image) }}" class="image-thumbnail image-preview" width="100px">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="active">Active</label>
                            <select name="active" id="active" class="form-control">
                                <option value="" hidden>-- choose --</option>
                                <option value="yes"{{ $post->active == 'yes' ? 'selected' : null }}>Yes</option>
                                <option value="no"{{ $post->active == 'no' ? 'selected' : null }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="" hidden>-- choose --</option>
                                <option value="draft"{{ $post->status == 'draft' ? 'selected' : null }}>Draft</option>
                                <option value="publish"{{ $post->status == 'publish' ? 'selected' : null }}>Publish</option>
                            </select>
                        </div>
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

{{-- css untuk multiselect category     --}}
<link rel="stylesheet" href="{{ asset('back/css/virtual-select.min.css') }}">

{{-- js untuk multiselect category  --}}
<script src="{{ asset('back/js/virtual-select.min.js') }}"></script>

<style>
    #category{
        max-width: 100%;
    }
    .vscomp-toggle-button{
        border-radius: 5px;
    }
</style>

<script type="text/javascript">
    VirtualSelect.init({
    ele: '#category',
    });
</script>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            extraPlugins: 'link',
            clipboard_handleImages: false
        };

        $(document).ready(function() {
            CKEDITOR.replace('myeditor', options);
        });

         //image preview
         $("#image").change (function(){
            previewImage(this);
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

