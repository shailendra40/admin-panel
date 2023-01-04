@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $about->id }}">
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required
                            value="{{ $about->title }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" onchange="previewImage(event)"
                            placeholder="Image" required>
                    </div>
                    <img id="preview" style="max-width: 400px; max-height:400px" />

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="summernote">
                            {{ $about->content }}
                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn-primary">Update About</button>
                </div>
            </form>
    </section>

    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
