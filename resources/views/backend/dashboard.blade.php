@extends('backend.layouts.master')
@section('backend-title', 'About Us')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- About Us Section -->
        <section class="py-5">
            <div class="container px-5">
                <h1 class="fw-bolder fs-5 mb-4">Home</h1>
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row gx-0">
                            <div class="col-lg-6 col-xl-5 py-lg-5">
                                <div class="p-4 p-md-5">
                                    <div class="h2 fw-bolder">Health Welfare Nepal</div>
                                    <p>
                                        Welcome to Health Welfare Nepal, where we are dedicated to enhancing access to healthcare and home assistance across Nepal. Our platform facilitates convenient doctor appointments, offers support for household tasks, and ensures every service is meticulously recorded for quality and continuity. With our integrated chat and feedback systems, we continuously refine our offerings. Join us in transforming health services, empowering both users and medical professionals alike.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-7"><img src="{{ asset('backend/images/logo.png') }}" alt="" style="width: 350px; height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <!-- Mid Section -->
        <section class="mid-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('backend/images/becomedoctor.png') }}" alt="Mid Image" class="img-fluid" style="width: 350px; height: 300px;">
                    </div>
                    <div class="col-md-6">
                        <h2>Join Our Team</h2>
                        <p>Are you a healthcare professional seeking to make a difference?<br> At Health Welfare Nepal, we offer a unique opportunity for doctors to connect with patients right in their communities. Apply now to become part of a network that your value accessibility and quality care.</p>
                        <a href="{{ route('becomedoctors.display') }}" class="btn btn-primary">Become a doctor</a>
                    </div>
                </div>
            </div>
        </section>
        <br>

        {{-- <!-- Contact Us Section -->
        <section class="contact-us-section">
            <div class="top-image">
                <img src="{{ asset('backend/images/hnwhome.png') }}" alt="Contact Us Image" class="img-fluid" style="width: 100%; height: 200px;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Hours of Operation</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Phone</h3>
                        <p>+1234567890</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Feedbacks</h3>
                        <!-- Feedback form or display area can be added here -->
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
@endsection
