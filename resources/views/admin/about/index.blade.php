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
                        <img id="preview1" src="{{ asset($about->image) }}" style="width: 150px; height:150px" />
                    </td>



                    <td>
                        <a href="/admin/about/edit/{{ $about->id }}">
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn-block btn-warning btn-sm"> Update
                                </button>
                        </a>
                        <a href="{{ url('admin/about/destroy/' . $about->id) }}">
                            <button type="button" class="btn-block btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-default" style="width:auto;"
                                onclick="replaceLinkFunction">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const previewImage1 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview1');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
