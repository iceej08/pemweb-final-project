@extends('layout-navbar')

@section('title', 'Moodiary - Add Yours')

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
        <a href="/addDiary" class="nav-item-custom active mb-4" aria-current="true">
            <img src="{{ asset('images/navbar/add.png') }}" alt="Add">
            <span>Add</span>
        </a>
        <a href="{{ route('profile', ['username' => session('user_moodiary')]) }}" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/profile.png') }}" alt="Add" style="width: 35px; height: auto;">
            <span>Profile</span>
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="container ms-5 p-5 px-5" 
style="background-color:#FFF0DC; border-radius: 2rem; box-shadow: 1rem 1rem 3rem rgba(0, 0, 0, 0.5);">
    <h3 class="text-center fw-bold mb-4">How are you feeling today?</h3>

    <!-- Mood Selector -->
    <form method="POST" action="{{ isset($diary) ? route('diary.update', $diary->id) : route('diary.store') }}"
        enctype="multipart/form-data">
        @csrf
        @if (@isset($diary))
            @method("PUT")
        @endif
        <div class="d-flex justify-content-center gap-4 mb-4">
            @foreach (['terrific', 'good', 'so-so', 'bad', 'awful'] as $mood)
                <label>
                    <input type="radio" name="mood" value="{{ $mood }}" hidden required
                    {{ (isset($diary) && $diary->mood === $mood) ? 'checked' : '' }}>
                    <img class="mood" src="{{ asset("images/moods/$mood.png") }}" alt="{{ $mood }}" width="100">
                    <p class="mood text-center">{{ ucfirst($mood) }}</p>
                </label>
            @endforeach
        </div>

        <!-- Diary -->
        <div class="mb-3">
            <label for="diary" class="form-label fw-semibold">Today's Feeling</label>
            <textarea name="diary" id="diary" rows="5" class="form-control" placeholder="Write your feeling here...">{{ old('diary', $diary->diary ?? '' ) }}</textarea>
        </div>

        <!-- Upload Memory -->
        <div class="mb-3">
            <label for="photo" class="form-label fw-semibold">Upload your memory</label>
            <input class="form-control" type="file" name="photo" accept="image/*">
            @if(isset($diary) && $diary->photo)
                <p class="mt-2">Current Photo:</p>
                <img src="{{ asset('storage/' . $diary->photo) }}" alt="Diary Photo" width="200">
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="btn px-4 fw-bold text-white" id="save">
            {{ isset($diary) ? 'Update' : 'Save' }}
        </button>
    </form>
</div>
@endsection