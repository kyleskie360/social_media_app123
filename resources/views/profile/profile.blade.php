@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-pill" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Profile Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 rounded-top">
            <h5 class="card-title mb-0">Update Profile</h5>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('profiles.update') }}">
                @csrf
                @method('POST')

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control rounded-pill border-0 shadow-sm" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control rounded-pill border-0 shadow-sm" value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password (leave blank to keep current)</label>
                    <input type="password" id="password" name="password" class="form-control rounded-pill border-0 shadow-sm" placeholder="Enter new password">
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-pill border-0 shadow-sm" placeholder="Confirm new password">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
