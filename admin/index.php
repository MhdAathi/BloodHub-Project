<?php
session_start();
include('authentication.php');
include('includes/header.php');
?>

<style>
    /* Global Styles */
    .container-fluid {
        padding: 0 20px;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    /* Card Styles */
    .card {
        border: none;
        border-radius: 10px;
        background-color: #780606;
        /* Professional color scheme */
        color: #fff;
    }

    .card-body {
        padding: 0.5rem;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        text-align: center;
        margin-bottom: 1.0rem;
    }

    .progress {
        height: 20px;
        margin-bottom: 1rem;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: #e38e00;
        /* Professional color scheme */
        height: 100%;
        border-radius: 10px;
    }

    .card-footer {
        background-color: #780606;
        /* Professional color scheme */
        padding: 0.5rem 1.5rem;
        border-top: none;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .small {
        font-size: 0.8rem;
    }

    .stretched-link {
        color: #fff;
        text-decoration: none;
    }

    .stretched-link:hover {
        color: #fff;
        text-decoration: none;
    }
</style>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">BloodHub Stock Levels</li>
    </ol>

    <div class="row mb-3">
        <!-- A+ Blood Type -->
        <div class="col-xl-3 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> A+ Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    <p>120 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- A- Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> A- Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <p>80 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- B+ Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> B+ Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <p>40 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- B- Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> B- Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                    </div>
                    <p>130 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- AB+ Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> AB+ Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                    </div>
                    <p>100 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- AB- Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> AB- Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                    </div>
                    <p>50 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- O+ Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> O+ Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                    </div>
                    <p>180 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- O- Blood Type -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-tint"></i> O- Blood</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
                    </div>
                    <p>90 units available</p>
                </div>
                <div class="card-footer">
                    <a class="small stretched-link" href="#">View Details <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>