<style>
    /* Navbar */
    .navbar {
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        
    }

    .navbar .navbar-brand {
        color: #000;
        font-size: 28px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 2px;
        transition: color 0.3s ease;
    }

    .navbar .navbar-brand:focus,
    .navbar .navbar-brand:hover {
        color: #106eea; 
    }

    .navbar .navbar-nav .nav-link {
        color: #333;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 500;
        margin-right: 10px;
        transition: color 0.3s ease;
        position: relative;
    }

    .navbar .navbar-nav .nav-link:focus,
    .navbar .navbar-nav .nav-link:hover {
        color: #ea1410;
    }

    /* Underline animation on hover */
    .navbar .navbar-nav .nav-link:after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #ea1410;
        transition: width 0.3s;
        position: absolute;
        bottom: -5px;
        left: 0;
    }

    .navbar .navbar-nav .nav-link:hover:after {
        width: 100%;
    }

    /* Get Started Button */
    .navbar .getstarted {
        background: linear-gradient(90deg, #106eea, #54b4eb);
        margin-left: 30px;
        border-radius: 30px;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        padding: 0.5rem 1.5rem;
        line-height: 2.3;
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .navbar .getstarted:hover {
        background: linear-gradient(90deg, #54b4eb, #106eea);
        box-shadow: 0 8px 15px rgba(16, 110, 234, 0.2);
    }

    /* Navbar Toggler */
    .navbar-toggler {
        padding: 8px 10px;
        font-size: 18px;
        background: #ea1410;
        color: #fff;
        border: none;
        transition: background 0.3s ease;
    }

    .navbar-toggler:focus,
    .navbar-toggler:hover {
        background: #54b4eb;
    }

    .w-100 {
        height: 50vh;
    }

    /* Mobile Styles */
    @media (max-width: 991px) {
        .navbar .navbar-nav {
            text-align: center;
        }

        .navbar .navbar-nav .nav-link {
            margin-bottom: 10px;
        }
    }

    /* Navbar */
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><span class="text-danger">Blood</span>Hub</a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="request-blood.php">Request Blood</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donate-blood.php">Donate Blood</a>
                </li>

                <?php if (isset($_SESSION['auth_user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['user_name'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                            <li>
                                <form action="allcode.php" method="POST">
                                    <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
