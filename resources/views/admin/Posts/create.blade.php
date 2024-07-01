@extends('admin.layouts.master')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Create New Post</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="imageInput" name="image" onchange="previewImage()">
                    <div id="imagePreview"></div>
                </div>

                <div class="form-group mb-3">
                    <label for="documents" class="form-label">Documents:</label>
                    <input type="file" class="form-control" id="documentsInput" name="documents[]" multiple onchange="previewDocuments()">
                    <div id="documentsPreview"></div>
                </div>

                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Create Post</button>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('imageInput');
        var preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview" width="100">';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = '';
        }
    }

    function previewDocuments() {
        var input = document.getElementById('documentsInput');
        var preview = document.getElementById('documentsPreview');

        preview.innerHTML = ''; // Clear any previous previews

        if (input.files && input.files.length > 0) {
            for (var i = 0; i < input.files.length; i++) {
                var file = input.files[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var filePreview = document.createElement('div');
                    filePreview.innerHTML = '<p>' + file.name + '</p><embed src="' + e.target.result + '" width="200" height="200">';
                    preview.appendChild(filePreview);
                }

                reader.readAsDataURL(file);
            }
        }
    }
</script>

@endsection
