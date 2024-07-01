@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Posts List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>
                        @foreach ($post->categories as $category)
                            {{ $category->title }}
                            @if (!$loop->last) <!-- Add a comma if it's not the last category -->
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <!-- Add data-toggle and data-target to trigger the modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-post-id="{{ $post->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for delete confirmation -->
<div class="modal" id="deleteConfirmationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- The following button will be clicked when confirming the deletion -->
                <button type="button" class="btn btn-danger" id="confirmDeleteButton" data-post-id=""></button>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to trigger the delete confirmation modal
    function confirmDelete(postId) {
        $('#deleteConfirmationModal').modal('show'); // Show the modal

        // Set the data-post-id attribute to the postId in the modal's Delete button
        $('#confirmDeleteButton').attr('data-post-id', postId);

        // When the "Delete" button in the modal is clicked, handle the deletion
        $('#confirmDeleteButton').on('click', function() {
            $('#deleteConfirmationModal').modal('hide'); // Hide the modal

            // Get the postId from the data-post-id attribute of the Delete button
            var postIdToDelete = $(this).data('post-id');

            // Redirect to the delete route with the postId as a parameter
            window.location.href = "{{ route('admin.posts.destroy', '') }}/" + postIdToDelete;
        });
    }
</script>
@endsection
