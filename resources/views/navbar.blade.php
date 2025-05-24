<!-- resources/views/navbar.blade.php -->

<div class="sidebar d-flex flex-column align-items-start px-4 py-4" style="min-height: 50vh;">
    <!--Logo-->
    <div class="d-flex align-items-center mb-4 mt-3">
        <img src="{{ asset('images/mood/navbar/logo moodiary navbar.png') }}" alt="Logo" width="50" height="50" class="me-2">
        <h4 class="m-0 font-logo fw-bold">Moodiary</h4>
    </div>

    <div class="sidebar-content mt-3 px-3">
        <a href="#" class="nav-item-custom mb-1 mt-3">
        <img src="{{ asset('images/mood/navbar/home navbar.png') }}" alt="Home">
        <span>Home</span>
        </a>
        <a href="#" class="nav-item-custom mb-1">
            <img src="{{ asset('images/mood/navbar/chart navbar.png') }}" alt="Chart">
            <span>Chart</span>
        </a>
        <a href="#" class="nav-item-custom mb-1">
            <img src="{{ asset('images/mood/navbar/calender navbar.png') }}" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="#" class="nav-item-custom mb-1">
            <img src="{{ asset('images/mood/navbar/recap navbar.png') }}" alt="Recap">
            <span>Recap</span>
        </a>
        <a href="#" class="nav-item-custom mt-2">
            <img src="{{ asset('images/mood/navbar/add navbar.png') }}" alt="Add">
            <span>Add</span>
        </a>
    </div>
</div>
