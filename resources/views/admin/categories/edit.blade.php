@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Category</h2>
        </div>
        <div class="card-body">
            
            <!-- Edit Category Form -->
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                
                <!-- Category Name -->
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Category Name</label>

                    <div class="col-sm-12">
                        <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
                    </div>
                </div>

                <!-- Update Category Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update Category
                        </button>
                        <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
