@extends('layouts.front')

@section('title')
    Resume
@endsection

@section('css')
@endsection

@section('content')
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">RESUME</h6>
                <h2 class="section-title">EDUCATION</h2>
                <ul class="time-line">
                    <li class="time-line-item">
                        <span class="badge badge-primary">1998 - 2005</span>
                        <h6 class="time-line-item-title">Master In Computer Science</h6>
                        <p class="time-line-item-subtitle">MASTER, UNIVERSITY</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed tortor.</p>
                    </li>
                    <li class="time-line-item">
                        <span class="badge badge-primary">1995 - 1998</span>
                        <h6 class="time-line-item-title">Studied at Harvard University</h6>
                        <p class="time-line-item-subtitle">UNIVERSITY</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed tortor.
                        </p>
                    </li>
                    <li class="time-line-item">
                        <span class="badge badge-primary">1993 - 1995</span>
                        <h6 class="time-line-item-title">Studied at Oxford University</h6>
                        <p class="time-line-item-subtitle">UNIVERSITY</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed tortor.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">RESUME</h6>
                <h2 class="section-title">Experience</h2>
                <ul class="time-line">
                    <li class="time-line-item">
                        <span class="badge badge-primary">2010 - 2014</span>
                        <h6 class="time-line-item-title">UI/UX Designer</h6>
                        <p class="time-line-item-subtitle">Web Agency</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed
                            tortor.</p>
                    </li>
                    <li class="time-line-item">
                        <span class="badge badge-primary">2008 - 2010</span>
                        <h6 class="time-line-item-title">Web Designer</h6>
                        <p class="time-line-item-subtitle">Apple Inc.</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed
                            tortor.
                        </p>
                    </li>
                    <li class="time-line-item">
                        <span class="badge badge-primary">2006 - 2008</span>
                        <h6 class="time-line-item-title">Graphic Designer</h6>
                        <p class="time-line-item-subtitle">Apple Inc.</p>
                        <p class="time-line-item-content">Mauris magna sapien, pharetra consectetur fringilla
                            vitae, interdum sed
                            tortor.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="clients-section">
        <h6 class="section-subtitle">WHAT I DO</h6>
        <h2 class="section-title">CLIENTS</h2>
        <div class="client-logos-wrapper">
            <div class="client-logo"><img src="assets/images/Clients_1.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_2.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_3.svg" alt="logo" class="w-100"></div>
            <div class="client-logo"><img src="assets/images/Clients_4.svg" alt="logo" class="w-100"></div>
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
    <section class="achievements-section">
        <h6 class="section-subtitle">WHAT I DO</h6>
        <h2 class="section-title">ACHIEVEMENTS</h2>
        <div class="achievement-cards-wrapper">
            <div class="media achievement-card">
                <img src="assets/images/puzzle.svg" alt="puzzle" class="achievement-card-icon">
                <div class="media-body">
                    <h4 class="achievement-card-title">550+</h4>
                    <p class="achievement-card-description">COMPLETED PROJECTS</p>
                </div>
            </div>
            <div class="media achievement-card">
                <img src="assets/images/team.svg" alt="puzzle" class="achievement-card-icon">
                <div class="media-body">
                    <h4 class="achievement-card-title">23K</h4>
                    <p class="achievement-card-description">HAPPY CLIENTS</p>
                </div>
            </div>
            <div class="media achievement-card">
                <img src="assets/images/trophy.svg" alt="puzzle" class="achievement-card-icon">
                <div class="media-body">
                    <h4 class="achievement-card-title">55</h4>
                    <p class="achievement-card-description">AWARDS RECIEVED</p>
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
