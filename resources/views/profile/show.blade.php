<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app') <!-- Use your layout as needed -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <!-- Add more profile information as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
