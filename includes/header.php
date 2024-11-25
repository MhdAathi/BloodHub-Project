<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Hub</title>

    <!-- Bootstrap Link CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">

    <!-- Custom Link CSS Files -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom Link Styles Files -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <script defer src="assets/js/script.js"></script>

    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Full-page loader styles */
        .full-page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease-in-out;
        }

        .full-page-loader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        /* Flipping animation loader */
        .flipping {
            height: 22.4px;
            display: grid;
            grid-template-columns: repeat(5, 22.4px);
            grid-gap: 5.6px;
        }

        .flipping div {
            animation: flipping-owie1ymd 0.75s calc(var(--delay) * 0.6s) infinite ease;
            background-color: #c20114;
            /* Blood red color */
            height: 100%;
            width: 100%;
            border-radius: 4px;
        }

        .flipping div:nth-of-type(1) {
            --delay: 0.15;
        }

        .flipping div:nth-of-type(1) {
            --delay: 0.2;
        }

        .flipping div:nth-of-type(2) {
            --delay: 0.4;
        }

        .flipping div:nth-of-type(3) {
            --delay: 0.6000000000000001;
        }

        .flipping div:nth-of-type(4) {
            --delay: 0.8;
        }

        .flipping div:nth-of-type(5) {
            --delay: 1;
        }

        @keyframes flipping-owie1ymd {
            0% {
                transform: perspective(44.8px) rotateY(-180deg);
            }

            50% {
                transform: perspective(44.8px) rotateY(0deg);
            }

            100% {
                transform: perspective(44.8px) rotateY(180deg);
            }
        }
    </style>
</head>

<!-- Full-screen loader -->
<div class="full-page-loader" id="fullPageLoader">
    <div class="flipping">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<script>
    // Page loader logic
    window.addEventListener("load", function() {
        const pageLoader = document.getElementById("fullPageLoader");

        // Reduced delay for quicker loading
        setTimeout(() => {
            pageLoader.classList.add("hidden");
        }, 1000); // Reduced delay to 1 second (1000ms)
    });

    // Functions to handle loader during AJAX requests
    function showLoader() {
        const loader = document.getElementById("fullPageLoader");
        loader.classList.remove("hidden");
    }

    function hideLoader() {
        const loader = document.getElementById("fullPageLoader");
        loader.classList.add("hidden");
    }

    // Example AJAX request simulation
    function simulateAjaxRequest() {
        showLoader();
        setTimeout(() => {
            hideLoader();
            alert("AJAX content loaded!");
        }, 1500); // Simulate a 2-second delay for the AJAX request
    }
</script>