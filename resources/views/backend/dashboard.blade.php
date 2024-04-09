@extends('backend.layouts.master')
@section('backend-title', 'About Us')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- About Us Section -->
        <section class="py-5">
            <div class="container px-5">
                <h1 class="fw-bolder fs-5 mb-4">About Us</h1>
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row gx-0">
                            <div class="col-lg-6 col-xl-5 py-lg-5">
                                <div class="p-4 p-md-5">
                                    <div class="h2 fw-bolder">Health Welfare Nepal</div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique delectus ab doloremque, qui doloribus ea officiis...
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique delectus ab doloremque, qui doloribus ea officiis...
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique delectus ab doloremque, qui doloribus ea officiis...
                                    </p>
                                    <a class="stretched-link text-decoration-none" href="#!">
                                        Read more
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-7"><img src="{{ asset('backend/images/hnwhome.png') }}" alt="" style="width: 350px; height: 300px;"></div>
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
                        <img src="{{ asset('backend/images/hnwhome.png') }}" alt="Mid Image" class="img-fluid" style="width: 350px; height: 300px;">
                    </div>
                    <div class="col-md-6">
                        <h2>Become a Doctor</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
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
