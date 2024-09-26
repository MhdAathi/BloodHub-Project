<?php
session_start();
include('admin/authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    /* Import Montserrat Font */
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap");

    /* Global Styles */
    * {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f1fbff;
    }

    h2 {
        font-size: 35px;
        font-weight: 600;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        text-align: center;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
    }


    .section-padding {
        padding: 25px 0;
    }

    /* Carousel Styles */
    .carousel-item {
        height: 75vh;
        min-height: 100px;

    }

    /* Carousel Image Styles */
    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-inner::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .carousel-caption {
        bottom: 120px;
        z-index: 2;
    }

    .carousel-caption h5 {
        font-size: 40px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 25px;
    }

    .carousel-caption p {
        width: 70%;
        margin: auto;
        font-size: 18px;
        line-height: 1.9;
    }

    /* About Card Styles */
    .about_card {
        background-color: #f7f7f7;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        height: 100%;
        overflow: hidden;
    }

    .about_card h3 {
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .about_card img {
        margin: 0 auto;
        display: block;
        width: 30%;
        height: auto;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .about_card p {
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
        text-overflow: ellipsis;
    }

    /* CTA Section */
    .cta-section {
        color: #fff;
        padding: 60px 0;
        text-align: center;
    }

    .cta-section h2 {
        color: #333;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .cta-section p {
        color: #333;
        font-size: 18px;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 50px;
        /* Reduced gap for better spacing */
        flex-wrap: wrap;
    }

    .cta-buttons .cta-request,
    .cta-buttons .cta-donate {
        background-color: #fff;
        color: #333;
        padding: 20px;
        border-radius: 10px;
        /* Increased border radius for a softer look */
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        overflow: hidden;
        /* Ensures content doesn’t overflow */
    }

    .cta-buttons .cta-request:hover,
    .cta-buttons .cta-donate:hover {
        transform: translateY(-8px);
        /* Increased hover lift effect */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Enhanced shadow on hover */
    }

    .cta-buttons img {
        display: block;
        margin: 0 auto 15px;
        width: 80px;
        /* Reduced image size */
        height: 80px;
        /* Reduced image size */
        object-fit: contain;
    }

    .cta-buttons h3 {
        text-transform: uppercase;
        font-size: 22px;
        /* Slightly increased font size */
        margin-bottom: 15px;
    }

    .cta-buttons p {
        font-size: 16px;
        line-height: 1.6;
        /* Increased line height for better readability */
        margin-bottom: 20px;
    }

    .cta-buttons .btn .a {
        display: block;
        margin: 0 auto;
        font-size: 14px;
        /* Slightly increased font size */
        font-weight: 500;
        /* Increased font weight */
        text-transform: uppercase;
        color: #fff;
        padding: 05px 10px;
        /* Increased padding for better button appearance */
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        /* Smooth transition for background color */
    }

    .cta-buttons .btn-success {
        background-color: #28a745;
        /* Custom green color for success */
    }

    .cta-buttons .btn-danger {
        background-color: #dc3545;
        /* Custom red color for danger */
    }

    .cta-buttons .btn:hover {
        background-color: #333;
        /* Darker background color on hover */
    }

    /* Media Queries */
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .carousel-caption {
            bottom: 370px;
        }

        .carousel-caption p {
            width: 100%;
        }

        .img-area img {
            width: 100%;
        }
    }

    @media only screen and (max-width: 767px) {
        .navbar-nav {
            text-align: center;
        }

        .carousel-caption {
            bottom: 125px;
        }

        .carousel-caption h5 {
            font-size: 17px;
        }

        .carousel-caption p {
            width: 100%;
            line-height: 1.6;
            font-size: 12px;
        }

        .about-text {
            padding-top: 50px;
        }

        .card {
            margin-bottom: 30px;
        }
    }
</style>


<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
    <div class="carousel-indicators">
        <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img alt="..." class="d-block w-100" src="assets\images\Img1.jpg">
            <div class="carousel-caption">
                <h5>Join Our Blood Donation Drive</h5>
                <p>Your contribution helps save lives. Participate in our next blood donation drive and make a difference in your community.</p>
                <p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100" src="assets\images\Img2.jpg">
            <div class="carousel-caption">
                <h5>Donate Blood, Save Lives</h5>
                <p>Every drop counts. Be a hero by donating blood. Your donation can save up to three lives.</p>
                <p><a class="btn btn-warning mt-3" href="#cta">Donate Now</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100" src="assets\images\Img3.jpg">
            <div class="carousel-caption">
                <h5>Request Blood When Needed</h5>
                <p>In an emergency? Submit a request for blood and get support from our network. We’re here to help.</p>
                <p><a class="btn btn-warning mt-3" href="#cta">Request Blood</a></p>
            </div>
        </div>
    </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
</div>

<!-- about section starts -->
<section class="about section-padding" id="about">
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h2 class="text-uppercase">About Us</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 d-flex">

                <div class="about-img"><img alt="" class="img-fluid w-100 h-100" src="assets\images\about.jpg"></div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5">
                <div class="about-text">
                    <h3 class="font-weight-bold mb-3 text-uppercase">Providing Life-Saving Quality Services</h3>
                    <p>At BloodHub, we are committed to offering exceptional services that truly make an impact. Whether you urgently need blood or wish to donate and save lives, our platform is designed to support you in every possible way. <span style="color:red; font-weight:500"> Join us in our mission to ensure that no one is left without the essential care they deserve.</span></p>
                    <p class="mt-3">Our dedication to excellence goes beyond just fulfilling blood requests.<span style="color:red; font-weight:500"> We prioritize safety, reliability, and efficiency</span> in every aspect of our service. Together, we can create a healthier, more supportive community where everyone plays a part in saving lives.</p>
                    <h3 class="mt-5">BLOOD GROUPS</h3>
                    <p class="mt-1">Learn about the different blood groups and their importance.</p>
                    <ul>
                        <li>A positive or A negative</li>
                        <li>B positive or B negative</li>
                        <li>O positive or O negative</li>
                        <li>AB positive or AB negative</li>
                    </ul>
                    <a class="btn btn-warning mt-3" href="https://en.wikipedia.org/wiki/Blood_type">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section Ends -->

<!-- about card section -->
<section class="about-card section-padding" id="about-card">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="about_card">
                    <h3 class="text-center">Our Vision</h3>
                    <img src="assets/images/binoculars.png" alt="Our Vision" class="justify-center" width="168" height="168">
                    <p class="text-center mt-3">
                        At BloodHub, our vision is to revolutionize blood donation and distribution through cutting-edge technology. We aim to create a world where timely <span style="color:red; font-weight:500"> access to blood resources </span> is guaranteed, enhancing community health and support.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="about_card">
                    <h3 class="text-center">Our Goal</h3>
                    <img src="assets/images/target.png" alt="Our Goal" class="img img-responsive" width="168" height="168">
                    <p class="text-center mt-3">
                        Our goal is to transform blood bank management with a centralized platform that <span style="color:red; font-weight:500"> improves operational efficiency </span> and ensures blood availability. We seek to <span style="color:red; font-weight:500"> elevate patient care </span> and optimize the blood supply chain.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="about_card">
                    <h3 class="text-center">Our Mission</h3>
                    <img src="assets/images/goal.png" alt="Our Mission" class="img img-responsive" width="168" height="168">
                    <p class="text-center mt-3">
                        Our mission is to streamline blood donation and distribution with an innovative online platform. We focus on <span style="color:red; font-weight:500"> increasing accessibility and efficiency </span> in blood management, supporting and saving lives with precision and care.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about card section -->

<!-- Contact starts -->
<section class="contact section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center pb-3">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or need assistance, Contact us today and let us know how we can assist you!</p>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <!-- Image Column -->
            <div class="col-md-4 p-4 text-center">
                <img src="assets\images\contact.jpg" class="img-fluid" alt="Contact Image" style="max-width: 100%; height: auto;">
            </div>
            <!-- Form Column -->
            <div class="col-md-8 p-4">
                <form action="#" class="bg-light p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" required placeholder="Your Full Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="email" class="form-control" required placeholder="Your Email Address">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea rows="3" required class="form-control" placeholder="Your Query Here"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-warning btn-sm">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- contact ends -->

<!-- donate section -->
<section class="cta-section" id="cta">
    <div class="container">
        <h2>Make a Difference Today</h2>
        <p>Whether you need blood or want to donate, your participation can help save lives in our community. Get started now!</p>

        <div class="cta-buttons">
            <div class="cta-request">
                <img src="assets/images/request-icon.jpg" alt="Request Blood">
                <h3>Request Blood</h3>
                <p>Need blood urgently? Submit a request and get help from our community.</p>
                <a href="request-blood.php" class="btn btn-success align-items-center">Request Blood</a>
                <p class="mt-2"><em>Over 500 requests fulfilled last month.</em></p>
            </div>

            <div class="cta-donate">
                <img src="assets/images/donate-icon.jpg" alt="Donate Blood">
                <h3>Donate Blood</h3>
                <p>Become a hero by donating blood. Your single donation can save up to three lives.</p>
                <a href="donate-blood.php" class="btn btn-danger">Donate Blood</a>
                <p class="mt-2"><em>Join 10,000+ donors already making a difference.</em></p>
            </div>
        </div>
    </div>
</section>
<!-- end donate section -->

<?php
include('includes/footer.php');
?>