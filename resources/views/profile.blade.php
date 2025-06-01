<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logomoo.png">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background: linear-gradient(180deg, #fef3e2 0%, #F0BB78 100%);
            min-height: 100vh;
        }
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background:rgb(237, 173, 90);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }

        .profile-title {
            color: #6c7b7f;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .form-label {
            color: #495057;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-control:focus {
            border-color: #6c7b7f;
            box-shadow: 0 0 0 0.2rem rgba(108, 123, 127, 0.25);
            background: #fff;
        }

        .btn-save {
            background: #6c7b7f;
            border: none;
            border-radius: 8px;
            padding: 12px 40px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-save:hover {
            background: #5a6b6f;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(108, 123, 127, 0.3);
        }

        .form-floating > .form-control {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }

        .form-floating > label {
            color: #6c757d;
        }
        

        @media (max-width: 576px) {
            .profile-card {
                margin: 20px;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body></body>
</html>

@extends('layout-navbar')

@section('title', 'Moodiary - Profile')

@section('navbar')
<div class="sidebar fixed-top d-flex flex-column align-items-start px-3 py-4" style="min-height: 100vh;">
    <div class="d-flex align-items-center mb-2 mt-4 me-3 fw-semibold" style="font-family: 'Alkatra', cursive; font-size:1.5rem;">
        <img src="{{ asset('images/logomoo.png') }}" style="width: 70px; height: 70px; margin-right:10px;"> Moodiary </div>

    <div class="sidebar-content mt-4">
        <a href="/home" class="nav-item-custom mb-4">
        <img src="{{ asset('images/navbar/home.png') }}" alt="Home">
        <span>Home</span>
        </a>
        <a href="/chart" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/chart.png') }}" alt="Chart">
            <span>Chart</span>
        </a>
        <a href="/calendar" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/calender.png') }}" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="/recap" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/recap.png') }}" alt="Recap">
            <span>Recap</span>
        </a>
        <a href="/addDiary" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/add.png') }}" alt="Add">
            <span>Add</span>
        </a>
        <a href="{{ route('profile', ['username' => session('user_moodiary')]) }}" class="nav-item-custom active mb-4">
            <img src="{{ asset('images/navbar/profile.png') }}" alt="Add" style="width: 35px; height: auto;">
            <span>Profile</span>
        </a>
    </div>
</div>
@endsection


@section('content')

    <h2 class="text-center fw-bold mb-0">Profile Page</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid d-flex align-items-center justify-content-center py-4">
        <div style="width:35rem">
            <div class="profile-card p-5">
                <!-- Profile Avatar -->
                <div class="profile-avatar">
                    <img src="{{ asset('images/avatar.png') }}" alt="avatar">
                </div>

                <!-- Profile Title -->
                <h2 class="profile-title text-center">Good afternoon, {{$user->name}}</h2>

                <!-- Profile Form -->
                <form method="POST" action="{{ route('profile.update', ['username' => $user->username, 'id' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="new_name" placeholder="Name" value="{{ old('new_name', $user->name) }}">
                        <label for="name">Name</label>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" name="new_email" placeholder="E-mail" value="{{ old('new_email', $user->email) }}">
                        <label for="email">E-mail</label>
                    </div>

                    <!-- Username Field -->
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="username" name="new_username" placeholder="Username" value="{{ ($user->username) }}" disabled>
                        <label for="username">Username</label>
                    </div>

                    <!-- Button Row -->
                    <div class="d-flex justify-content-between gap-2 mt-3">
                        <!-- Save Button -->
                        <button type="submit" class="btn btn-save w-100 text-white" style="background-color:rgb(237, 173, 90)">
                            <i class="fas fa-save me-2"></i>Save Edit
                        </button>
                   
                </form>
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger text-white">
                            <span>Logout</span>
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection