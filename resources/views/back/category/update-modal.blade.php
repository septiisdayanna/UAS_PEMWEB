@foreach ($categories as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-while">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('categories/'.$item->id) }}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="title">Name</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item->title) }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="active">Active</label>
                            <select type="text" name="active" id="active"
                                class="form-control @error('active') is-invalid @enderror" value="{{ old('active', $item->active) }}">
                                <option value="yes" {{ old('active', $item->active) == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('active', $item->active) == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
