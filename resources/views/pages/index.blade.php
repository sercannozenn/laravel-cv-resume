@extends('layouts.front')

@section('title')
    Index
@endsection

@section('css')
@endsection

@section('content')
    <section class="intro-section">
        <h2 class="section-title">Hello, Daisy Murphy!</h2>
        <p>I'm Creative Director and UI/UX Designer from Sydney, Australia, working in web development and print
            media. I enjoy turning complex problems into simple, beautiful and intuitive designs. My job is to
            build your website so that it is functional and user-friendly but at the same time attractive.
            Moreover, I add personal touch to your product and make sure that is eye-catching and easy to use.
            My aim is to bring across your message and identity in the most creative way. I created web design
            for many famous brand companies.</p>
        <a href="#!" class="btn btn-primary btn-hire-me">HIRE ME</a>
    </section>
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">RESUME</h6>
                <h2 class="section-title">EDUCATION</h2>
                <ul class="time-line">
                    @foreach($educationList as $education)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $education->education_date }}</span>
                            <h6 class="time-line-item-title">{{ $education->university_branch }}</h6>
                            <p class="time-line-item-subtitle">{{ $education->university_name }}</p>
                            <p class="time-line-item-content">{{ $education->description }}</p>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">RESUME</h6>
                <h2 class="section-title">Experience</h2>
                <ul class="time-line">
                    @foreach($experienceList as $experience)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $experience->date }}</span>
                            <h6 class="time-line-item-title">{{ $experience->task_name }}</h6>
                            <p class="time-line-item-subtitle">{{ $experience->company_name }}</p>
                            <p class="time-line-item-content">{{ $experience->description }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section class="services-section">
        <h6 class="section-subtitle">WHAT I DO</h6>
        <h2 class="section-title">SERVICES</h2>
        <div class="row">
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="assets/images/001-target.svg" alt="target">
                </div>
                <div class="media-body">
                    <h5 class="service-title">web designing</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae, interdum
                        sed
                        tortor.</p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="assets/images/003-idea.svg" alt="bulb">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Graphic design</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae, interdum
                        sed
                        tortor.
                    </p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="assets/images/002-development.svg" alt="development">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Development</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae, interdum
                        sed
                        tortor.
                    </p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="assets/images/004-smartphone.svg" alt="smartphone">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Mobile design</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae, interdum
                        sed
                        tortor.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div id="testimonialCarousel" class="testimonial-carousel carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="assets/images/Profile.png" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
                <div class="carousel-item">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="assets/images/Profile.png" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
                <div class="carousel-item">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="assets/images/Profile.png" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                <li data-target="#testimonialCarousel" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
@endsection

@section('js')
@endsection
