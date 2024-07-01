@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Social Links List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Facebook Link</th>
                                <th>Twitter Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sociallinks as $sociallink)
                                <tr>
                                    <td>{{ $sociallink->facebook_link }}</td>
                                    <td>{{ $sociallink->twitter_link }}</td>
                                    <td>
                                        <a href="{{ route('admin.sociallink.edit', $sociallink->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <!-- Add delete button or other actions if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
