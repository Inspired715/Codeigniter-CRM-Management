<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Seamotech</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?php echo base_url('assets/img/favicon.png')?>" rel="icon">
  <link href="<?php echo base_url('assets/vendor/aos/aos.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/landingstyle.css')?>" rel="stylesheet">
</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="<?php echo base_url('/')?>">SEAMO<span>TECH</span></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#featured-services">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto contact" href="#contact" style="border-radius: 4px;background: #0D2E61;padding: 10px 24px;">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Empowering <br>Your Business</h1>
      <h2>Tech Solutions, Service Beyond Excellence</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">LEARN MORE</a>
      </div>
    </div>
  </section>
  <main id="main">
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row banner-title">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 p-1">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title">BRANDING AND MARKETING</h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 p-1">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title">SOCIAL MEDIA MANAGEMENT</h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 p-1">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title">WEB & MOBILE DEVELOPMENT</h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 p-1">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title">CRM AND API INTEGRATION</h4>
            </div>
          </div>
        </div>
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0 about-left" data-aos="fade-up" data-aos-delay="100">
              <h1>About Us</h1>
              <p>
                At Seamo Tech we are dedicated to transforming your business's online presence.
              </p>
              <p>
                We're a multicultural team based in Estonia, offering a wide range of services to help your brand
                thrive.
              </p>
              <p class="fst-italic" style="color: #0D2E61;font-weight: 600;">
                We take pride in our transparency, competitive prices, and commitment to high-quality delivery.
              </p>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="<?php echo base_url('assets/img/about.png')?>" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="row section-title">
          <div class="col-lg-10 col-md-12">
            <div class="row">
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <h1>Services <span>We Offer</span></h1>
              </div>
              <div class="col-lg-8 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <p class="d-flex align-items-center">We're dedicated to helping you unlock digital excellence and elevate your brand to new heights. Our
                  comprehensive range of services covers everything you need to succeed in the digital landscape.</p>
              </div>
            </div>
          </div>
        </div>
        <div style="margin-top: 30px;">
          <div class="row" style="border-bottom: 1px solid #0D2E61;opacity: 0.8;">
            <button class="col-lg-3 col-md-12 tablinks" onclick="_open_service(event, 'web')" id="defaultOpen">WEB
              DEVELOPMENT</button>
            <button class="col-lg-3 col-md-12 tablinks" onclick="_open_service(event, 'brand')">BRANDING AND
              MARKETING</button>
            <button class="col-lg-3 col-md-12 tablinks" onclick="_open_service(event, 'social')">SOCIAL MEDIA
              MANAGEMENT</button>
            <button class="col-lg-3 col-md-12 tablinks" onclick="_open_service(event, 'crm')">CRM AND API
              INTEGRATION</button>
          </div>
          <div class="row">
            <div id="web" class="tabcontent">
              <h1 class="text-center mb-5">Web Development</h1>
              <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="d-flex flex-column" style="gap:30px;">
                    <h4>Full Stack Development</h4>
                    <div class="d-flex flex-column">
                      <p>Our expert developers handle every aspect of your project, from conceptualization to
                        deployment, ensuring a seamless and efficient process. With precision and innovation, we bring
                        your digital ideas to life, creating robust and user-friendly web applications</p>
                      <h6 style="font-style: italic;">Starts from 40$/ hour</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                  data-aos-delay="200">
                  <img src="<?php echo base_url('assets/img/web-dev.png')?>" style="width: 100%;" alt="web development png">
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                  data-aos-delay="300">
                  <div class="d-flex flex-column" style="gap:30px;">
                    <h4>Dynamic WordPress + PHP Websites</h4>
                    <div class="d-flex flex-column">
                      <p>Crafting websites that blend functionality and aesthetics, we specialize in dynamic WordPress +
                        PHP solutions</p>
                      <h6>Starts from 50$/ page</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <img src="<?php echo base_url('assets/img/monitor.png')?>" style="width: 100%;" alt="web development monitor png">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                  <div class="d-flex flex-column" style="gap:30px;">
                    <h4>Design and Prototyping (Figma)</h4>
                    <div class="d-flex flex-column">
                      <p>Our design team excels at creating engaging and user-friendly designs, with Figma prototypes
                        that ensure seamless user experiences.</p>
                      <h6>Starts from 100$ per page</h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box">
                    <img src="<?php echo base_url('assets/img/handle.png')?>" style="width: 100%;" alt="web handling png">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                  <button class="btn-web-dev">View Web Development Services</button>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                </div>
              </div>
            </div>
            <div id="brand" class="tabcontent">
              <img src="<?php echo base_url('assets/img/brand-bg.png')?>" style="width: 100%; position: relative;" alt="brand png">
              <div class="on-hover-section">
                <div class="d-flex flex-column" style="gap:30px;">
                  <h1>Branding & Marketing</h1>
                  <div class="d-flex flex-column">
                    <p>We craft tailored branding and marketing strategies to set your business apart. Our focus is on
                      creating resonance with your target audience and establishing a strong brand identity that stands
                      out in the digital landscape.</p>
                    <h6 style="font-style: italic;">Starts from 40$/ hour</h6>
                  </div>
                  <button class="btn-web-dev">Explore Branding and Marketing</button>
                </div>
              </div>
            </div>
            <div id="social" class="tabcontent">
              <img src="<?php echo base_url('assets/img/social-bg.png')?>" style="width: 100%; position: relative;" alt="social png">
              <div class="on-hover-section">
                <div class="d-flex flex-column" style="gap:30px;">
                  <h1>Social Media Management</h1>
                  <div class="d-flex flex-column">
                    <p>Effective social media management is the key to engaging with your audience. We're experts in
                      crafting captivating social media strategies and content that drive results.</p>
                    <h6 style="font-style: italic;">Starts from 399$ per month</h6>
                  </div>
                  <button class="btn-web-dev">Discover Social Media Services</button>
                </div>
              </div>
            </div>
            <div id="crm" class="tabcontent">
              <img src="<?php echo base_url('assets/img/crm-bg.png')?>" style="width: 100%; position: relative;" alt="CRM png">
              <div class="on-hover-section">
                <div class="d-flex flex-column" style="gap:30px;">
                  <h1>CRM and API Integration</h1>
                  <div class="d-flex flex-column">
                    <p>We excel in CRM solutions and API creation/integration, streamlining your business processes and
                      enhancing connectivity. Our focus is on optimizing efficiency and creating seamless connections
                      within your digital ecosystem.</p>
                    <h6 style="font-style: italic;">Starts from 40$/ hour</h6>
                  </div>
                  <button class="btn-web-dev">Learn More About CRM and APIs</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-9">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <h1 class="mb-5">Contact Us</h1>
              <div class="row">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <button class="btn-web-dev" style="width: 200px;" type="submit">Send Message</button>
            </form>
          </div>
          <div class="col-lg-3 d-flex flex-column mb-3" style="gap:40px">
            <br><br><br>
            <div>
              <h6>Email</h6>
              <p>hello@seamotech.com</p>
            </div>
            <div>
              <h6>Socials</h6>
              <div class="d-flex" style="gap:25px">
                <img src="<?php echo base_url('assets/img/facebook.svg')?>" alt="facebook icon">
                <img src="<?php echo base_url('assets/img/linkedin.svg')?>" alt="linkedin icon">
                <img src="<?php echo base_url('assets/img/vector.svg')?>" alt="vector icon">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="testimonials">
        <div class="container" data-aos="zoom-in">
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <h3>VenturyFX</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Seamo Tech has been instrumental in our online branding efforts. Their creativity and attention to
                    detail are unmatched.<i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <h3>Simsem</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Seamo Tech's social media strategies have boosted our online presence and customer engagement
                    significantly.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <h3>Publimark</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Publimark has benefited immensely from Seamo Tech's web development expertise, creating a dynamic
                    and responsive online presence.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h1 class="logo"><a href="index.html">SEAMO<span>TECH</span></a></h1>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <ul>
              <li><a href="#hero">Home</a></li>
              <li><a href="#featured-services">About us</a></li>
              <li><a href="#services">Services</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <ul>
              <li><a href="#">PORTFOLIO</a></li>
              <li><a href="#contact">CONTNACT US</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <div class="d-flex" style="gap:25px">
              <img src="<?php echo base_url('assets/img/facebook-white.svg')?>" alt="facebook icon">
              <img src="<?php echo base_url('assets/img/linkedin-white.svg')?>" alt="linkedin icon">
              <img src="<?php echo base_url('assets/img/vector-white.svg')?>" alt="vector icon">
            </div>
            <h6 style="margin-top: 15px;">EMAIL US</h6>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/aos/aos.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.js')?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js')?>"></script>
</body>

</html>