@extends('admin.layouts.master')


@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $about)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $about->title ?? '' }}</td>
                    <td>{{ $about->content ?? '' }}</td>
                    <td>
                        <img id="preview1" src="{{ url("uploads/about/" . $about->image) }}" style="width: 100px; height:100px" />
                    </td>



                    <td>
                        <a href="/admin/about/edit/{{ $about->id }}">
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn-block btn-warning btn-sm"> Update
                                </button>
                        </a>
                        {{-- {{ url('admin/about/destroy/' . $about->id) }} --}}
                        <button type="button" class="btn-block btn-danger btn-sm" data-toggle="modal"
                            data-target="#exampleModal" style="width:auto;" onclick="replaceLinkFunction">
                            Delete
                        </button>

                        {{-- #modal-default --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($abouts as $about)

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                    <a href="{{ url('admin/about/destroy/' . $about->id) }}">
                        <button type="button" class="btn btn-danger">Yes</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
        
    @endforeach
    

    <script>
        const previewImage1 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview1');
                preview.src = reader.result;
            };
        };

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
