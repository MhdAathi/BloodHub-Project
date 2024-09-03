<body>
<style>
    /* Footer Styles */

.footer {
  background-color: #333;
  color: #fff;
  padding: 20px 0;
}

.footer .container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.footer .row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.footer .col-md-4 {
  flex-basis: 33.33%;
  padding: 20px;
}

.footer h5 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.footer p {
  font-size: 14px;
  margin-bottom: 20px;
}

.footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 10px;
}

.footer-links a {
  color: #fff;
  text-decoration: none;
  transition: color 0.2s ease;
}

.footer-links a:hover {
  color: #ccc;
}

.social-icons {
  display: flex;
  justify-content: space-between;
}

.social-icons a {
  color: #fff;
  font-size: 18px;
  margin-right: 20px;
  transition: color 0.2s ease;
}

.social-icons a:hover {
  color: #ccc;
}

.copyright {
  background-color: #444;
  color: #fff;
  padding: 10px 0;
  text-align: center;
  font-size: 14px;
}

.mt-4 {
  margin-top: 40px;
}

/* Media Queries */

@media (max-width: 768px) {
  .footer .col-md-4 {
    flex-basis: 50%;
  }
}

@media (max-width: 480px) {
  .footer .col-md-4 {
    flex-basis: 100%;
  }
}


/* Animations */

.footer-links a:hover {
  animation: link-hover 0.2s ease;
}

.social-icons a:hover {
  animation: social-hover 0.2s ease;
}

@keyframes link-hover {
  0% {
    color: #fff;
  }
  100% {
    color: #ccc;
  }
}

@keyframes social-hover {
  0% {
    color: #fff;
  }
  100% {
    color: #ccc;
  }
}
</style>
    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> 123 Blood Bank St, City, Country<br>
                        <i class="fas fa-phone"></i> +123 456 7890<br>
                        <i class="fas fa-envelope"></i> contact@bloodbank.com
                    </p>
                </div>
                <!-- Quick Links -->
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <div class="footer-links">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Donate</a></li>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                        
                    </div>
                </div>
                <!-- Social Media Icons -->
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mt-4">© 2024 Blood Bank Management. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/boostrap5.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>