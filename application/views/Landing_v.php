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
        <a href="#featured-services" class="btn-get-started scrollto">LEARN MORE</a>
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
                  <img src="<?php echo base_url('assets/img/services/web-dev.png')?>" style="width: 100%;" alt="web development png">
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
                    <img src="<?php echo base_url('assets/img/services/monitor.png')?>" style="width: 100%;" alt="web development monitor png">
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
                    <img src="<?php echo base_url('assets/img/services/handle.png')?>" style="width: 100%;" alt="web handling png">
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
              <img src="<?php echo base_url('assets/img/services/brand-bg.png')?>" style="width: 100%; position: relative;" alt="brand png">
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
              <img src="<?php echo base_url('assets/img/services/social-bg.png')?>" style="width: 100%; position: relative;" alt="social png">
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
              <img src="<?php echo base_url('assets/img/services/crm-bg.png')?>" style="width: 100%; position: relative;" alt="CRM png">
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
            <form method="post" role="form" class="php-email-form" id="contact_form">
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
                <img src="<?php echo base_url('assets/img/socials/facebook.svg')?>" alt="facebook icon">
                <img src="<?php echo base_url('assets/img/socials/linkedin.svg')?>" alt="linkedin icon">
                <img src="<?php echo base_url('assets/img/socials/vector.svg')?>" alt="vector icon">
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
        <div class="container" data-aos="fade-up">
          <div class="testimonials-slider">
            <div class="row">
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center" style="gap:10px">
                <img class="ventury" src="<?php echo base_url('assets/img/testimonials/ventury.png')?>">
                <p>VenturyFX</p>
              </div>
              <div class="col-sm-12 col-md-6">
                <p class="description">
                  “Seamo Tech has been instrumental in our online branding efforts. Their creativity and attention to detail are unmatched.”
                </p>
              </div>
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center align-items-center" style="gap:10px;cursor:grabbing;">
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(1)">
                  <p class="m-0 d-flex align-items-center">Next</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="34" viewBox="0 0 28 34" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.191 9.76075C18.688 9.17496 19.4939 9.17496 19.9909 9.76075L25.081 15.7599L25.0818 15.7607C25.2038 15.9046 25.2959 16.0703 25.358 16.2472C25.4202 16.4241 25.4546 16.618 25.4546 16.8214C25.4546 17.024 25.4205 17.2172 25.3587 17.3935C25.3281 17.4811 25.2901 17.5659 25.2448 17.6468C25.1982 17.7299 25.1439 17.8088 25.0818 17.8821L25.081 17.8829L19.9909 23.8821C19.4939 24.4678 18.688 24.4678 18.191 23.8821C17.694 23.2963 17.694 22.3465 18.191 21.7607L21.1092 18.3214H3.8182C3.11529 18.3214 2.54547 17.6498 2.54547 16.8214C2.54547 15.993 3.11529 15.3214 3.8182 15.3214H21.1092L18.191 11.8821C17.694 11.2963 17.694 10.3465 18.191 9.76075Z" fill="white"/>
                  </svg>
                </div>
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(-1)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="33" viewBox="0 0 28 33" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80902 23.5607C9.31202 24.1464 8.50613 24.1464 8.00913 23.5607L2.91898 17.5615L2.91822 17.5607C2.79616 17.4168 2.70414 17.2511 2.64204 17.0742C2.5798 16.8973 2.54544 16.7034 2.54544 16.5C2.54544 16.2974 2.57955 16.1042 2.64127 15.9279C2.67195 15.8403 2.70987 15.7555 2.75518 15.6747C2.80176 15.5915 2.85611 15.5126 2.91822 15.4393L2.91898 15.4385L8.00913 9.43933C8.50613 8.8536 9.31202 8.8536 9.80902 9.43933C10.306 10.0251 10.306 10.9749 9.80902 11.5607L6.89078 15L24.1818 15C24.8847 15 25.4545 15.6716 25.4545 16.5C25.4545 17.3284 24.8847 18 24.1818 18L6.89078 18L9.80902 21.4393C10.306 22.0251 10.306 22.9749 9.80902 23.5607Z" fill="white"/>
                  </svg>
                  <p class="m-0 d-flex align-items-center">Prev</p>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonials-slider">
            <div class="row">
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center" style="gap:10px">
                <img class="simsem" src="<?php echo base_url('assets/img/testimonials/simsem.png')?>">
                <p>Simsem</p>
              </div>
              <div class="col-sm-12 col-md-6">
                <p class="description">
                  “Seamo Tech's social media strategies have boosted our online presence and customer engagement significantly.”
                </p>
              </div>
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center align-items-center" style="gap:10px;cursor:grabbing;">
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(1)">
                  <p class="m-0 d-flex align-items-center">Next</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="34" viewBox="0 0 28 34" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.191 9.76075C18.688 9.17496 19.4939 9.17496 19.9909 9.76075L25.081 15.7599L25.0818 15.7607C25.2038 15.9046 25.2959 16.0703 25.358 16.2472C25.4202 16.4241 25.4546 16.618 25.4546 16.8214C25.4546 17.024 25.4205 17.2172 25.3587 17.3935C25.3281 17.4811 25.2901 17.5659 25.2448 17.6468C25.1982 17.7299 25.1439 17.8088 25.0818 17.8821L25.081 17.8829L19.9909 23.8821C19.4939 24.4678 18.688 24.4678 18.191 23.8821C17.694 23.2963 17.694 22.3465 18.191 21.7607L21.1092 18.3214H3.8182C3.11529 18.3214 2.54547 17.6498 2.54547 16.8214C2.54547 15.993 3.11529 15.3214 3.8182 15.3214H21.1092L18.191 11.8821C17.694 11.2963 17.694 10.3465 18.191 9.76075Z" fill="white"/>
                  </svg>
                </div>
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(-1)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="33" viewBox="0 0 28 33" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80902 23.5607C9.31202 24.1464 8.50613 24.1464 8.00913 23.5607L2.91898 17.5615L2.91822 17.5607C2.79616 17.4168 2.70414 17.2511 2.64204 17.0742C2.5798 16.8973 2.54544 16.7034 2.54544 16.5C2.54544 16.2974 2.57955 16.1042 2.64127 15.9279C2.67195 15.8403 2.70987 15.7555 2.75518 15.6747C2.80176 15.5915 2.85611 15.5126 2.91822 15.4393L2.91898 15.4385L8.00913 9.43933C8.50613 8.8536 9.31202 8.8536 9.80902 9.43933C10.306 10.0251 10.306 10.9749 9.80902 11.5607L6.89078 15L24.1818 15C24.8847 15 25.4545 15.6716 25.4545 16.5C25.4545 17.3284 24.8847 18 24.1818 18L6.89078 18L9.80902 21.4393C10.306 22.0251 10.306 22.9749 9.80902 23.5607Z" fill="white"/>
                  </svg>
                  <p class="m-0 d-flex align-items-center">Prev</p>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonials-slider">
            <div class="row">
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center" style="gap:10px">
                <img class="pm" src="<?php echo base_url('assets/img/testimonials/pm.png')?>">
                <p>Publimark</p>
              </div>
              <div class="col-sm-12 col-md-6">
                <p class="description">
                  “Publimark has benefited immensely from Seamo Tech's web development expertise, creating a dynamic and responsive online presence.”
                </p>
              </div>
              <div class="col-sm-12 col-md-3 d-flex flex-column justify-content-center align-items-center" style="gap:10px;cursor:grabbing;">
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(1)">
                  <p class="m-0 d-flex align-items-center">Next</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="34" viewBox="0 0 28 34" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.191 9.76075C18.688 9.17496 19.4939 9.17496 19.9909 9.76075L25.081 15.7599L25.0818 15.7607C25.2038 15.9046 25.2959 16.0703 25.358 16.2472C25.4202 16.4241 25.4546 16.618 25.4546 16.8214C25.4546 17.024 25.4205 17.2172 25.3587 17.3935C25.3281 17.4811 25.2901 17.5659 25.2448 17.6468C25.1982 17.7299 25.1439 17.8088 25.0818 17.8821L25.081 17.8829L19.9909 23.8821C19.4939 24.4678 18.688 24.4678 18.191 23.8821C17.694 23.2963 17.694 22.3465 18.191 21.7607L21.1092 18.3214H3.8182C3.11529 18.3214 2.54547 17.6498 2.54547 16.8214C2.54547 15.993 3.11529 15.3214 3.8182 15.3214H21.1092L18.191 11.8821C17.694 11.2963 17.694 10.3465 18.191 9.76075Z" fill="white"/>
                  </svg>
                </div>
                <div class="d-flex justify-ceont-center" style="gap:20px" onclick="plusSlides(-1)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="33" viewBox="0 0 28 33" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80902 23.5607C9.31202 24.1464 8.50613 24.1464 8.00913 23.5607L2.91898 17.5615L2.91822 17.5607C2.79616 17.4168 2.70414 17.2511 2.64204 17.0742C2.5798 16.8973 2.54544 16.7034 2.54544 16.5C2.54544 16.2974 2.57955 16.1042 2.64127 15.9279C2.67195 15.8403 2.70987 15.7555 2.75518 15.6747C2.80176 15.5915 2.85611 15.5126 2.91822 15.4393L2.91898 15.4385L8.00913 9.43933C8.50613 8.8536 9.31202 8.8536 9.80902 9.43933C10.306 10.0251 10.306 10.9749 9.80902 11.5607L6.89078 15L24.1818 15C24.8847 15 25.4545 15.6716 25.4545 16.5C25.4545 17.3284 24.8847 18 24.1818 18L6.89078 18L9.80902 21.4393C10.306 22.0251 10.306 22.9749 9.80902 23.5607Z" fill="white"/>
                  </svg>
                  <p class="m-0 d-flex align-items-center">Prev</p>
                </div>
              </div>
            </div>
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
              <img src="<?php echo base_url('assets/img/socials/facebook-white.svg')?>" alt="facebook icon">
              <img src="<?php echo base_url('assets/img/socials/linkedin-white.svg')?>" alt="linkedin icon">
              <img src="<?php echo base_url('assets/img/socials/vector-white.svg')?>" alt="vector icon">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/vendor/aos/aos.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js')?>"></script>
</body>

</html>