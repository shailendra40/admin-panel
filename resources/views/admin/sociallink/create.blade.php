@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form id="socialLinkForm" method="POST" action="{{ route('admin.sociallink.store') }}">
                @csrf

                <!-- Add these lines for Facebook and Twitter links -->
                <div class="form-group">
                    <label for="facebook_link">Facebook Link</label>
                    <input type="text" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}" placeholder="Facebook Link">
                </div>

                <div class="form-group">
                    <label for="twitter_link">Twitter Link</label>
                    <input type="text" name="twitter_link" class="form-control" value="{{ old('twitter_link') }}" placeholder="Twitter Link">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Social Link</button>
                </div>
            </form>
        </div>
    </section>
@endsection
