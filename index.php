<?php
require("config/db_connection.php");

// Delete archived documents older than 5 years
mysqli_query($conn, "DELETE FROM archived_documents WHERE archived_date < NOW() - INTERVAL 5 YEAR");

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accreditation Document Management System</title>

  <!-- Primary Meta Tags -->
  <meta name="title" content="Accreditation Document Management System">
  <meta name="description" content="Accreditation Document Management System">

  <!--====== Favicon Icon ======-->
  <link
    rel="shortcut icon"
    href="assets/img/icon.png"
    type="image/svg" />

  <!-- ===== All CSS files ===== -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/lineicons.css" />
  <link rel="stylesheet" href="assets/css/ud-styles.css" />
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
</head>

<body>
  <!-- ====== Header Start ====== -->
  <header class="ud-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" style="">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="assets/img/logo/logo.svg" alt="Logo" />
            </a>
            <button class="navbar-toggler">
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
            </button>

            <div class="navbar-collapse">
              <ul id="nav" class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#home">Home</a>
                </li>

                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#campus">Campus</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="#contact">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                  // Fetch the user name from the session or database if needed
                  $userName = $_SESSION['name']; // Assuming 'name' is stored in the session
                  echo '<li class="nav-item d-inline-block d-sm-none">';
                  echo "<a href='login-page.php' class='ud-menu-scroll'><span>Welcome, $userName</span></a>";
                  echo '</li>';
                } else {
                  echo '<li class="nav-item d-inline-block d-sm-none">';
                  echo '<a href="login-page.php">Sign In</a>';
                  echo '</li>';
                  echo '<li class="nav-item d-inline-block d-sm-none">';
                  echo '<a href="register.php">Sign Up</a>';
                  echo '</li>';
                }
                ?>

              </ul>
            </div>

            <div class="navbar-btn d-none d-sm-inline-block">
              <?php
              if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                // Fetch the user name from the session or database if needed
                $userName = $_SESSION['name']; // Assuming 'name' is stored in the session
                echo "<a href='login-page.php' class='ud-main-btn ud-login-btn'><span>Welcome, $userName</span></a>";
              } else {
                echo '<a href="login-page.php" class="ud-main-btn ud-login-btn">Sign In</a>';
                echo '<a class="ud-main-btn ud-white-btn" href="register.php">Sign Up</a>';
              }
              ?>
            </div>

          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ====== Header End ====== -->

  <!-- ====== Hero Start ====== -->
  <section class="ud-hero" id="home">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
            <h1 class="ud-hero-title">
              Accreditation Document Management System
            </h1>
            <p class="ud-hero-desc">
              A digital solution that organizes, stores, and manages documents for accreditation processes, ensuring easy access and compliance during assessments.
            </p>
          </div>
          <?php
          // Check if the session ID exists
          if (isset($_SESSION['id'])) {
            // Display the button if session ID exists
            echo '
    <ul class="ud-hero-buttons wow fadeInUp" data-wow-delay=".2s">
        <li>
            <a href="login-page.php" rel="nofollow noopener" class="ud-main-btn ud-white-btn">
                Redirect to System
            </a>
        </li>
    </ul>';
          }
          ?>
        </div>
      </div>
  </section>
  <!-- ====== Hero End ====== -->

  <!-- ====== About Start ====== -->
  <section id="about" class="ud-about">
    <div class="container">
      <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Mission"></button>
          <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1" aria-label="Vision"></button>
          <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2" aria-label="Organizational Chart"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
          <!-- Mission -->
          <div class="carousel-item active">
            <div class="ud-about-wrapper">
              <div class="ud-about-content-wrapper">
                <div class="ud-about-content">
                  <span class="tag">Mission</span>
                  <h2>Our Mission</h2>
                  <p>
                    Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Vision -->
          <div class="carousel-item">
            <div class="ud-about-wrapper">
              <div class="ud-about-content-wrapper">
                <div class="ud-about-content">
                  <span class="tag">Vision</span>
                  <h2>Our Vision</h2>
                  <p>
                    The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Organizational Chart -->
          <div class="carousel-item">
            <div class="ud-about-wrapper">
              <div class="ud-about-content-wrapper">
                <div class="ud-about-content">
                  <span class="tag">Organizational Chart</span>
                  <h2>Our Structure</h2>
                  <img src="assets/img/logo/org-chart.jpg" alt="Organizational Chart" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- ====== About End ====== -->

  <!-- ====== Campus Start ====== -->
  <section id="campus" class="ud-campus">
    <div class="container">
      <div id="campusCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Main Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="1" aria-label="Bacoor Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="2" aria-label="Carmona Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="3" aria-label="Cavite City Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="4" aria-label="General Trias City Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="5" aria-label="Imus Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="6" aria-label="Maragondon Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="7" aria-label="Naic Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="8" aria-label="Rosario Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="9" aria-label="Silang Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="10" aria-label="Tanza Campus"></button>
          <button type="button" data-bs-target="#campusCarousel" data-bs-slide-to="11" aria-label="Trece Martires City Campus"></button>
          <!-- Add buttons for all other campuses -->
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
          <!-- Main Campus -->
          <div class="carousel-item active">
            <div class="ud-campus-wrapper text-center">
              <h2>Main Campus</h2>
              <img
                src="assets/img/campuses/main.jpg"
                alt="Main Campus"
                class="img-fluid my-3 campus-image" />
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.9785202642383!2d120.87852487576087!3d14.196036086852203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd81e7a0fe7653%3A0xc55eb1a0b24cd16b!2sCavite%20State%20University%20-%20Main%20Campus!5e0!3m2!1sen!2sph!4v1736912908511!5m2!1sen!2sph"
                class="campus-map"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <!-- Bacoor Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Bacoor Campus</h2>
              <img
                src="assets/img/campuses/bacoor.jpg"
                alt="Bacoor Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.2495003722875!2d120.97877457576324!3d14.412775681646275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d22f4810979f%3A0xaf0dae4457b7d498!2sCavite%20State%20University%20-%20Bacoor%20Campus!5e0!3m2!1sen!2sph!4v1736912984557!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Carmona Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Carmona Campus</h2>
              <img
                src="assets/img/campuses/carmona.jpg"
                alt="Carmona Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.9045269309436!2d121.06212397576212!3d14.316978083956311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d771a8ee1419%3A0x8ba33fccb95a7b40!2sCavite%20State%20University%20-%20Carmona!5e0!3m2!1sen!2sph!4v1736913032034!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Cavite City Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Cavite City Campus</h2>
              <img
                src="assets/img/campuses/cavite-city.jpg"
                alt="Cavite City Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.4551109225476!2d120.87760827576388!3d14.458536480537651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962d58939deecb%3A0x2bdf6f9905631864!2sCavite%20State%20University%20-%20Cavite%20City%20Campus!5e0!3m2!1sen!2sph!4v1736913117910!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- General Trias City Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>General Trias City Campus</h2>
              <img
                src="assets/img/campuses/gentri.jpg"
                alt="General Trias City Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.7305962899673!2d120.87792897576297!3d14.384992882317679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962ca4f723d185%3A0xc265ecf258a9a270!2sCavite%20State%20University%20-%20General%20Trias%20Campus!5e0!3m2!1sen!2sph!4v1736913147683!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Imus Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Imus Campus</h2>
              <img
                src="assets/img/campuses/imus.jpg"
                alt="Imus Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.977364177217!2d120.94455757576357!3d14.428468081266491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d25e0e88d16b%3A0xc2f8607cd4512597!2sCavite%20State%20University%20-%20Imus%20Campus!5e0!3m2!1sen!2sph!4v1736913190371!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Maragondon Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Maragondon Campus</h2>
              <img
                src="assets/img/campuses/maragondon.jpg"
                alt="Maragondon Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.5888185391573!2d120.71841127576178!3d14.277185484911623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd8750b6f54f7f%3A0x9a87e0a8cf3c5430!2sCavite%20State%20University%20Maragondon%20Campus!5e0!3m2!1sen!2sph!4v1736913218859!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Naic Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Naic Campus</h2>
              <img
                src="assets/img/campuses/naic.jpg"
                alt="Naic Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.8059720224246!2d120.75136077576222!3d14.32270028381869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd87455338fbd5%3A0x7e2010992ae76e2!2sCavite%20State%20University%20-%20Naic%20Campus!5e0!3m2!1sen!2sph!4v1736913236088!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Rosario Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Rosario Campus</h2>
              <img
                src="assets/img/campuses/rosario.jpg"
                alt="Rosario Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.409351138043!2d120.86340437576321!3d14.403550281869247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962cec6eaa540d%3A0x494a6f0a105a7ef1!2sCavite%20State%20University%20-%20CCAT%20Campus!5e0!3m2!1sen!2sph!4v1736913284524!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Silang Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Silang Campus</h2>
              <img
                src="assets/img/campuses/silang.jpg"
                alt="Silang Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.2066249100417!2d120.97643427576138!3d14.241165585774244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7e7d0744eafd%3A0xf25bff0f1b1deb7b!2sCavite%20State%20University%2C%20Silang%20Campus!5e0!3m2!1sen!2sph!4v1736913302262!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Tanza Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Tanza Campus</h2>
              <img
                src="assets/img/campuses/tanza.jpg"
                alt="Tanza Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.6240621712886!2d120.84757427576237!3d14.333256283564777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd80655363e335%3A0x485feee6e1048a1b!2sCavite%20State%20University%20-%20Tanza%20Campus!5e0!3m2!1sen!2sph!4v1736913329251!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Trece Martires Campus -->
          <div class="carousel-item">
            <div class="ud-campus-wrapper text-center">
              <h2>Trece Martires Campus</h2>
              <img
                src="assets/img/campuses/trece.jpg"
                alt="Trece Martires Campus"
                class="img-fluid my-3 campus-image" />
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.483597949641!2d120.87347677576183!3d14.283311284764704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd80655363e331%3A0xa4247d4e2b9cbce8!2sCavite%20State%20University%20-%20Trece%20Martires%20Campus!5e0!3m2!1sen!2sph!4v1736913340793!5m2!1sen!2sph"
                class="campus-map"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#campusCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#campusCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- ====== Campus End ====== -->

  <!-- ====== Contact Start ====== -->
  <section id="contact" class="ud-contact">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-8 col-lg-7">
          <div class="ud-contact-content-wrapper">
            <div class="ud-contact-title">
              <span>CONTACT US</span>
              <h2>
                You can contact us here.
              </h2>
            </div>
            <div class="ud-contact-info-wrapper">
              <div class="ud-single-info">
                <div class="ud-info-icon">
                  <i class="lni lni-map-marker"></i>
                </div>
                <div class="ud-info-meta">
                  <h5>Our Location</h5>
                  <p>Cavite State University - Don Severino Delas Alas Campus, Indang, Cavite</p>
                </div>
              </div>
              <div class="ud-single-info">
                <div class="ud-info-icon">
                  <i class="lni lni-envelope"></i>
                </div>
                <div class="ud-info-meta">
                  <h5>How Can We Help?</h5>
                  <p>(046) 481-8722</p>
                  <div id="contact-email">Loading email...</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-5">
          <div
            class="ud-contact-form-wrapper wow fadeInUp"
            data-wow-delay=".2s">
            <h3 class="ud-contact-form-title">Send us a Message</h3>
            <form class="ud-contact-form" id="contactForm">
              <div class="ud-form-group">
                <label for="fullName">Full Name*</label>
                <input
                  type="text"
                  name="fullName"
                  placeholder="Juan Dela Cruz" />
              </div>
              <div class="ud-form-group">
                <label for="email">Email*</label>
                <input
                  type="email"
                  name="email"
                  placeholder="example@yourmail.com"
                  <?php
                  if (isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['email'])) {
                    // Set the email value from the session
                    echo 'value="' . htmlspecialchars($_SESSION['email']) . '"';
                  }
                  ?> />
              </div>
              <div class="ud-form-group">
                <label for="phone">Phone*</label>
                <input
                  type="text"
                  name="phone"
                  placeholder="+639 123 456 789" />
              </div>
              <div class="ud-form-group">
                <label for="message">Subject*</label>
                <textarea
                  id="subject"
                  name="subject"
                  rows="1"
                  placeholder="type your message here"></textarea>
              </div>
              <div class="ud-form-group">
                <label for="message">Message*</label>
                <textarea
                  id="message"
                  name="message"
                  rows="1"
                  placeholder="type your message here"></textarea>
              </div>
              <div class="ud-form-group mb-0">
                <button type="submit" class="ud-main-btn" id="sendEmail">
                  Send Message
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Contact End ====== -->

  <!-- ====== Footer Start ====== -->
  <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
    <div class="shape shape-1">
      <img src="assets/img/footer/shape-1.svg" alt="shape" />
    </div>
    <div class="shape shape-2">
      <img src="assets/img/footer/shape-2.svg" alt="shape" />
    </div>
    <div class="shape shape-3">
      <img src="assets/img/footer/shape-3.svg" alt="shape" />
    </div>
    <div class="ud-footer-widgets">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="ud-widget">
              <a href="index.html" class="ud-footer-logo">
                <img src="assets/img/logo/logo.svg" alt="logo" />
              </a>
              <p class="ud-widget-desc">
                A digital solution that organizes, stores, and manages documents for accreditation processes, ensuring easy access and compliance during assessments.
              </p>
              <ul class="ud-widget-socials">
                <li>
                  <a href="https://www.facebook.com/CaviteStateU">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ud-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p>Copyright @ 2025. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ====== Footer End ====== -->

  <!-- ====== Back To Top Start ====== -->
  <a href="javascript:void(0)" class="back-to-top">
    <i class="lni lni-chevron-up"> </i>
  </a>
  <!-- ====== Back To Top End ====== -->

  <!-- ====== All Javascript Files ====== -->
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/main-index.js"></script>
  <script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
      elem.addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector(elem.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
          offsetTop: 1 - 60,
        });
      });
    });

    // section menu active
    function onScroll(event) {
      const sections = document.querySelectorAll(".ud-menu-scroll");
      const scrollPos =
        window.pageYOffset ||
        document.documentElement.scrollTop ||
        document.body.scrollTop;

      for (let i = 0; i < sections.length; i++) {
        const currLink = sections[i];
        const val = currLink.getAttribute("href");
        const refElement = document.querySelector(val);
        const scrollTopMinus = scrollPos + 73;
        if (
          refElement.offsetTop <= scrollTopMinus &&
          refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
        ) {
          document
            .querySelector(".ud-menu-scroll")
            .classList.remove("active");
          currLink.classList.add("active");
        } else {
          currLink.classList.remove("active");
        }
      }
    }

    window.document.addEventListener("scroll", onScroll);

    $('#sendEmail').on('click', function() {
      const subject = $('#subject').val();
      const message = $('#message').val();

      // Validate inputs
      if (!subject || !message) {
        alert("Subject and message cannot be empty.");
        return;
      }

      $.ajax({
        type: "POST",
        url: "send_email.php", // Update to your correct path
        data: {
          subject: subject,
          message: message
        },
        success: function(response) {
          const res = JSON.parse(response);
          if (res.status === "success") {
            // Open the Gmail link
            window.open(res.link, '_blank');
            const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
            modal.hide();
            $('#contactForm')[0].reset(); // Clear the form
          } else {
            alert(res.message);
          }
        },
        error: function() {
          alert("An error occurred while sending the email.");
        }
      });
    });

    $(document).ready(function() {
      // AJAX request to fetch emails from the server
      $.ajax({
        url: 'get_emails.php', // PHP script to fetch emails
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // Check if the response contains any emails
          if (response.length > 0) {
            // Join multiple emails with a comma
            $('#contact-email').text(response.join(', '));
          } else {
            $('#contact-email').text('No contact email available');
          }
        },
        error: function() {
          $('#contact-email').text('Error fetching email');
        }
      });
    });
  </script>
</body>

</html>