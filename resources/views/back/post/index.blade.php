@extends('back.layout.template')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@section('title', 'List Post - Admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
        </div>

        <div class="mt-3">
            <a href="{{ url('post/create') }}" class="btn btn-success mb-2">Create</a>

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

            {{-- successs alert --}}
           <div class="swal" data-swal="{{ session('success') }}"></div>

            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Hits</th>
                        <th>Active</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- alert success --}}
    <script>
         const swalMessage = $('.swal').data('swal');
            if (swalMessage) {
                Swal.fire({
                    title: 'Success',
                    text: swalMessage,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            }

            function deletePost(e) {
                let id = e.getAttribute('data-id');

                swal.fire({
                    title: 'Delete Post',
                    text: "Are you sure.?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            url: '/post/' + id,
                            dataType: "json",
                            success: function(response){
                                swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                }).then((result) => {
                                    window.location.href = '/post';
                                })
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                    }
                })
            }
    </script>

    {{-- datables --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'hits',
                        name: 'hits'
                    },
                    {
                        data: 'active',
                        name: 'active'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        });
    </script>
@endpush
