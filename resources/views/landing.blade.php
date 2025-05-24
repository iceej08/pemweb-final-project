@extends('layout')

@section('title', 'Moodiary')

@section('contents')
<nav class="navbar navbar-expand-md mx-2" style="background-color: #F0BB78">
<div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family:'Alkatra', cursive;">
    <img src="{{ asset('images/logomoo.png') }}" style="width: 35px; height: 35px;"> Moodiary </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav ms-auto me-5 gap-5">
        <div><a class="nav-link active" href="#home">Home</a></div>
        <div><a class="nav-link" href="#about">About Us</a></div>
        <div><a class="nav-link" href="#contact">Contact</a></div>
    </div>
    <div class="navbar-nav ms-auto">
        <a href="{{ route('login') }}">
        <a href="#login" class="p-2">
            <img src="{{ asset('images/guesticon.jpg') }}" style="width: 35px; height: 35px;">
        </a>
    </div>
    </div>
</div>
</nav>

<section id="home">
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 text-left">
            <h1 style="font-family: 'Alkatra', cursive; font-size: 10rem; margin-bottom: -20px; margin-left:20px;"> Moodiary </h1>
            <em style="font-size: 2rem; text-align: left; margin-left: 30px; font-weight: 600">Your very own sanctuary</em>
            <p class="mt-5" style="margin-left:30px; font-size: 1.25rem">
                Through mindful living, we help harmonize emotional landscape, 
                creating space for peace and strength
            </p>
        </div>
        <div class="col-md-6 float-end">
            <div style="margin-left: 50px;"><img src="{{ asset('images/moobesar.png') }}" style="max-width: 650px"></div>
        </div>
    </div>
</div>

<section id="about">
<div class="container">
    <div class="text-center">
        <img src="{{ asset('images/about.png') }}" style="width: 60%; margin: 150px">
    </div>
</div>
</section>

<section id="contact">
<footer class="text-white py-4 mt-5" style="background-color: #543A14">
    <div class="container text-center">
        <div class="d-flex justify-content-center gap-5 my-2 fw-semibold">
            <div class="mt-3">Contact Us</div>
            <a href="https://gmail.com" target="blank"><img src="{{ asset('images/mail.png') }}" class="w-5"></a>
            <a href="https://instagram.com" target="blank"><img src="{{ asset('images/insta.png') }}" class="w-5"></a>
            <a href="https://facebook.com" target="blank"><img src="{{ asset('images/facebook.png') }}" class="w-5"></a>
            <a href="https://x.com" target="blank"><img src="{{ asset('images/twitter.png') }}" class="w-5"></a>
        </div>

        <div class="mt-3 me-3 fw-semibold" style="font-family: 'Alkatra', cursive">
            <img src="{{ asset('images/logomoo.png') }}" style="width: 50px; height: 50px;"> Moodiary </div>
        <p class="text-white small text-center mb-0">
            &copy; 2025 Moodiary. All rights reserved. <br>
            Created with much love for mindful living
        </p>
    </div>
</footer>
</section>

@endsection