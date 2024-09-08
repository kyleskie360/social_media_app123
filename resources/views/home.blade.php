@extends('layouts.app')

@section('content')
<style>
    .background-container {
        background-image: url('{{ asset('images/background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh; /* Ensures the background covers the viewport height */
        padding: 2rem; /* Adjust padding to fit your layout */
    }
</style>

<div class="container my-5 background-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white border-0 rounded-top">
                    <h5 class="mb-0">Dashboard</h5>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show rounded-pill" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="text-center mt-4">
                        <h4 class="text-muted">You are logged in!</h4>
                        <p class="text-muted">Explore your profile and settings using the navigation.</p>
                    </div>

                    <!-- Profile Management Section -->
                    <div class="mt-5">
                        <h5 class="mb-3">Profile Information</h5>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                                @if (auth()->user()->profile_picture)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" style="width: 150px;">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
