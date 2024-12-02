<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creato</title>
    <link rel="stylesheet" href="../dist/css/iconfont/tabler-icons.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <style>
        .dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #000;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 8px 0;
    transition: background-color 0.3s;
}

.dropdown-content a:hover {
    background-color: #333;
}

/* Font Awesome icon styles */
.fa-chevron-down {
    margin-left: 5px;
}
    </style>
</head>
<body>
    <!------------------------------>
    <!-- Header Start -->
    <!------------------------------>
    <header class="main-header position-fixed w-100">
            <div class="container">
                <nav class="navbar navbar-expand-xl py-0">
                    <div class="logo">
                        <a class="navbar-brand py-0 me-0" href="#"><img src="
                        " alt=""></a>
                    </div>
                    <a class="d-inline-block d-lg-block d-xl-none d-xxl-none  nav-toggler text-decoration-none"  data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="ti ti-menu-2"></i>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">                                             
                            <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="aboutus.php">About us</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Our Design <i class="fas fa-chevron-down"></i></a>
                                <div class="dropdown-content">
                                    <a href="#">Tshirts</a>
                                    <a href="#">Mugs</a>
                                    <a href="#">Trousers</a>
                                    <a href="#">Key tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Team </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Portfolio </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Review</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            
                            </ul>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary btn-hover-secondery text-capitalize " href="signups.php">Login</a>
                            </div>
                    </div>
                </nav>
            </div>

            <div class="offcanvas offcanvas-start"  tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <div class="logo">
                        <a class="navbar-brand py-0 me-0" href="#"><img src="../assets/images/Creato-logo.svg" alt=""></a>
                    </div> 
                    <button type="button" class="btn-close text-reset  ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ti ti-x"></i></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Team </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Portfolio </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        </ul>
                        <div class="login d-block align-items-center">
                            <a class="btn btn-primary text-capitalize w-100" href="#">contact us</a>
                        </div>
                </div>
            </div>
    </header>
 
    <section class="hero-banner position-relative">
        <div class="hero-bg-icons"></div>
        <div class="left-white-overlay position-relative"></div>
        <div class="right-white-overlay position-relative"></div>
        <div class="container position-relative">
            <div class="left-icon">
                <img src="../assets/images/hero/Macbook_color.svg" class="img-fluid position-absolute">
            </div>
            <div class="right-icon">
                <img src="../assets/images/hero/mobile-icon.svg" class="img-fluid position-absolute">
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12 text-center">
                    <div class="hero-title fs-1 fw-bold text-uppercase">
                        If you can<br>
                        <div class="highlight-hero-title position-relative">
                            <div class="highlight-hero-title-inner">
                                imagine it
                            </div>
                        </div>
                        we can make it
                    </div>
                    <p class="hero-subtitle fs-5 fw-normal mx-auto mb-0">We are a creative design agency located in the city of San Francisco, California.</p>
                    <div class="hero-action d-flex flex-wrap justify-content-center gap-3">
                        <a href="#" class="btn btn-primary btn-hover-secondery text-capitalize fw-normal">learn more</a>
                        <a href="#" class="btn btn-outline-primary btn-hover-outline-secondery text-capitalize fw-normal">contact us</a>
                    </div>
                    <div class="scrollspy-icon d-inline-block">
                        <a href="#feature-of-design">
                            <div class="pulse-animation">
                                <div class="pulse position-relative mx-auto">
                                    <div class="ring"></div>
                                    <div class="ring"></div>
                                    <div class="ring"></div>
                                    <div class="ring"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="options bg-white">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12 mb-lg-0 mb-md-3 mb-sm-3 mb-3">
                                <a href="#" class="option-col d-flex align-items-center text-decoration-none">
                                    <div class="icon">
                                        <img src="../assets/images/hero/icon_whoweare.svg" class="img-fluid">
                                    </div>
                                    <span class="ps-4 fw-bold fs-4">Who We Are</span>
                                </a>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12 mb-lg-0 mb-md-3 mb-sm-3 mb-3">
                                <a href="#" class="option-col d-flex align-items-center text-decoration-none">
                                    <div class="icon">
                                        <img src="../assets/images/hero/icon_whatwedo.svg" class="img-fluid">
                                    </div>
                                    <span class="ps-4 fw-bold fs-4">What We Do</span>
                                </a>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 col-12 mb-lg-0 mb-md-3 mb-sm-3 mb-3">
                                <a href="#" class="option-col d-flex align-items-center text-decoration-none">
                                    <div class="icon">
                                        <img src="../assets/images/hero/icon_ourteam.svg" class="img-fluid">
                                    </div>
                                    <span class="ps-4 fw-bold fs-4">Our Team</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------>
    <!-- Hero Section Start -->
    <!------------------------------>

    <!-------------------------------------->
    <!-- Feature of Design Section Start --->
    <!-------------------------------------->
    <section class="feature-of-design position-relative" id="feature-of-design">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-12">
                    <h1 class="fw-bold text-uppercase">
                        <span>The</span>
                        <span class="highlight-hero-title position-relative">
                            <span class="highlight-hero-title-inner">
                                feature
                            </span>
                            <div class="team position-absolute">
                                <img src="../assets/images/feature-of-design/arrow.svg" class="img-fluid">
                                <div class="btn btn-primary text-capitalize fw-normal d-block">Creato Team</div>
                            </div>
                        </span><br>
                        of design<br> starts here
                    </h1>
                    <p class="mb-0 fs-5 lh-base fw-normal">
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                    </p>
                    <a href="#" class="btn btn-primary btn-hover-secondery text-capitalize fw-normal mt-4">learn more</a>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="position-relative img-bg-overlay">
                       <img src="../assets/images/feature-of-design/Group 19768 (2).png" class="w-100">
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <!----------------------------------->
    <!-- Feature of Design Section End -->
    <!----------------------------------->


    <section class="section-bg-icons position-relative">
        <!------------------------------>
        <!--- Our Team Section Start---->
        <!------------------------------>
        <section class="our-team position-relative">
            <div class="container">
                <h5 class="fs-7 section-subheading text-uppercase text-center fw-500">our team</h5>
                <div class="fs-2 section-heading text-uppercase fw-bold text-center">
                    We make the<br> magic happen  every day
                </div>
                <div class="row ourteam-row position-relative">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-6 col-12 ">
                        <div class="team-card">
                            <div class="team-bg bg-primary d-flex align-items-end justify-content-center">
                                <img src="../assets/images/our-team/team1.svg" class="img-fluid">
                            </div>
                            <h4 class="text-uppercase fw-bold text-secondary">Mike Wong</h4>
                            <div class="fs-6 text-uppercase text-secondary fw-500">designer</div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-6 col-12">
                        <div class="team-card">
                            <div class="team-bg bg-info d-flex align-items-end justify-content-center">
                                <img src="../assets/images/our-team/team3.svg" class="img-fluid">
                            </div>
                            <h4 class="text-uppercase fw-bold text-secondary">Maria Zurich</h4>
                            <div class="fs-6 text-uppercase text-secondary fw-500">ceo</div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-sm-6 col-12">
                        <div class="team-card">
                            <div class="team-bg bg-warning d-flex align-items-end justify-content-center">
                                <img src="../assets/images/our-team/team2.svg" class="img-fluid">
                            </div>
                            <h4 class="text-uppercase fw-bold text-secondary">Margaret Zavala</h4>
                            <div class="fs-6 text-uppercase text-secondary fw-500">developer</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------------>
        <!----------- Our Team Section End --------------->
        <!------------------------------>

        <!--------------------------------------->
        <!--- Awasome Feature Section Start ----->
        <!--------------------------------------->
        <section class="awasome-feature position-relative">
            <div class="container">
                <h5 class="fs-7 section-subheading text-uppercase fw-500 text-center">OUR features</h5>
                <div class="fs-2 section-heading text-uppercase fw-bold text-center">
                    Tons of awesome features
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-12 text-center">
                        <div class="feature-card">
                            <img src="../assets/images/features/web-design.svg">
                            <h4 class="text-uppercase fw-bold text-secondary pt-4">Web design</h4>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-12 text-center">
                        <div class="feature-card">
                            <img src="../assets/images/features/e-commerce.svg">
                            <h4 class="text-uppercase fw-bold text-secondary pt-4">E-commerce</h4>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-12 text-center">
                        <div class="feature-card">
                            <img src="../assets/images/features/responsive-design.svg">
                            <h4 class="text-uppercase fw-bold text-secondary pt-4">Responsive<br> Design</h4>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-12 text-center">
                        <div class="feature-card">
                            <img src="../assets/images/features/creative.svg">
                            <h4 class="text-uppercase fw-bold text-secondary pt-4">Creative<br> Team</h4>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-6 col-12 text-center">
                        <div class="feature-card">
                            <img src="../assets/images/features/freindly-support.svg">
                            <h4 class="text-uppercase fw-bold text-secondary pt-4">Friendly Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <!----------------------------------->
        <!----Awasome Feature Section End---->
        <!----------------------------------->
    </section>  

    <!-------------------------------->
    <!-- Our Portflio Section Start -->
    <!-------------------------------->
    <section class="our-portfolio position-relative">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <h5 class="fs-7 section-subheading text-uppercase fw-500">OUR Portfolio</h5>
                    <div class="fs-2 section-heading text-uppercase fw-bold">
                        We strive for<br> the best
                    </div>
                </div>  
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <p class="mb-0 fs-4">
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                    </p>
                </div>  
            </div> 
            <div class="row portfolio-wrap">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <a href="#" class="d-block portfolio-box text-decoration-none">
                        <div class="portfolio-card">
                            <img src="../assets/images/our-portfolio/coco.png" class="w-100">
                        </div>  
                        <h4 class="text-uppercase fw-bold text-secondary pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-4 pt-sm-4 pt-3">Furniture  Projects</h4>
                        <h5 class="py-xxl-3 py-xl-3 py-lg-3 py-md-3 py-sm-2 py-2 text-secondary">2021</h5>   
                        <p class="mb-0 fs-4 pt-0">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                        </p>    
                    </a>
                    <a href="#" class="d-block portfolio-box text-decoration-none">
                        <div class="portfolio-card">
                            <img src="../assets/images/our-portfolio/twoagents.png" class="w-100">     
                        </div>   
                        <h4 class="text-uppercase fw-bold text-secondary pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-4 pt-sm-4 pt-3">Delivery  Projects</h4>
                        <h5 class="py-xxl-3 py-xl-3 py-lg-3 py-md-3 py-sm-2 py-2 text-secondary">2021</h5>   
                        <p class="mb-0 fs-4 pt-0">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                        </p>   
                     </a>
                     <a href="#" class="d-block portfolio-box text-decoration-none">
                        <div class="portfolio-card">
                            <img src="../assets/images/our-portfolio/Viametrics_5 1.png" class="w-100"> 
                        </div>  
                        <h4 class="text-uppercase fw-bold text-secondary pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-4 pt-sm-4 pt-3">Metrics  Projects</h4>
                        <h5 class="py-xxl-3 py-xl-3 py-lg-3 py-md-3 py-sm-2 py-2 text-secondary">2020</h5>   
                        <p class="mb-0 fs-4 pt-0">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                        </p>      
                     </a>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-xxl-5 mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3 mt-0">
                    <a href="#" class="d-block portfolio-box text-decoration-none">
                        <div class="portfolio-card">
                            <img src="../assets/images/our-portfolio/Daduo_10 4.png" class="w-100">     
                        </div> 
                        <h4 class="text-uppercase fw-bold text-secondary pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-4 pt-sm-4 pt-3">Hotel  Projects</h4>
                        <h5 class="py-xxl-3 py-xl-3 py-lg-3 py-md-3 py-sm-2 py-2 text-secondary">2021</h5>   
                        <p class="mb-0 fs-4 pt-0">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                        </p>  
                    </a>
                    <a href="#" class="d-block portfolio-box text-decoration-none">
                        <div class="portfolio-card">
                            <img src="../assets/images/our-portfolio/Beetlo.png" class="w-100">     
                        </div> 
                        <h4 class="text-uppercase fw-bold text-secondary pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-4 pt-sm-4 pt-3">Baby Light  Projects</h4>
                        <h5 class="py-xxl-3 py-xl-3 py-lg-3 py-md-3 py-sm-2 py-2 text-secondary">2020</h5>   
                        <p class="mb-0 fs-4 pt-0">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in  with the release Letraset.
                        </p>   
                     </a>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <a href="#" class="btn btn-primary btn-hover-secondery text-capitalize fw-normal">view more</a>
                </div>
            </div>   
        </div>
        <div class=""><img src="../assets/images/our-portfolio/waves.svg" class="w-100 position-relative wave"></div>
    </section>
    <!------------------------------>
    <!-- Our Portflio Section End -->
    <!------------------------------> 
   
    <!--------------------------------->
    <!-- Pricing Plans Section Start -->
    <!--------------------------------->
    <section class="pricing-plans position-relative">
        <div class="container">
            <h5 class="fs-7 section-subheading text-uppercase fw-500 text-center">OUR Pricing</h5>
            <div class="fs-2 section-heading text-uppercase fw-bold text-center">
                Easy and simple<br>Pricing Plans
            </div>
            <ul class="nav nav-tabs d-flex justify-content-center border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active text-uppercase border-0 fs-11" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" type="button" role="tab" aria-controls="monthly" aria-selected="true">monthly</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-uppercase border-0 fs-11" id="yearly-tab" data-bs-toggle="tab" data-bs-target="#yearly" type="button" role="tab" aria-controls="yearly" aria-selected="false">yearly</button>
                </li>
              </ul>
              <div class="tab-content position-relative" id="myTabContent">
                <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                    <div class="row card-body bg-white">
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card border-0 h-100">
                                    <div class="price d-flex align-items-end">
                                        <span class="text-secondary fs-3">$20</span>
                                        <small class="ps-3">/month</small>
                                    </div>
                                    <div class="card-details">
                                        <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">Intro</h3>
                                        <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                        <ul class="mb-0 list-unstyled ps-0 pt-3">
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">web design</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">cms</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-action">
                                        <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card border-0 h-100">
                                    <div class="price d-flex align-items-end">
                                        <span class="text-secondary fs-3">$50</span>
                                        <small class="ps-3">/month</small>
                                    </div>
                                    <div class="card-details">
                                        <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">base</h3>
                                        <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                        <ul class="mb-0 list-unstyled ps-0 pt-3">
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">web design</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">cms</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">hosting</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-action">
                                        <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 px-lg-3 px-md-3 px-sm-2 px-2">
                                <div class="pro-plan bg-primary position-relative">
                                    <span class="badge rounded-pill bg-white text-primary position-absolute text-uppercase fs-11">MOST POPULAR</span>
                                    <div class="price d-flex align-items-end">
                                        <span class="text-white fw-bold fs-3">$100</span>
                                        <small class="ps-3 text-white">/month</small>
                                    </div>
                                    <div class="card-details position-relative">
                                        <h3 class="text-uppercase mb-0 text-secondary overflow-hidden text-white">pro</h3>
                                        <p class="mb-0 fs-8 ps-0 text-white">For most businesses that want to otpimize web queries</p>
                                        <ul class="mb-0 list-unstyled ps-0 pt-3">
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle text-white"></i>
                                                <p class="mb-0 fs-8 text-capitalize text-white">web design</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle text-white"></i>
                                                <p class="mb-0 fs-8 text-capitalize text-white">cms</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle text-white"></i>
                                                <p class="mb-0 fs-8 text-capitalize text-white">hosting</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle text-white"></i>
                                                <p class="mb-0 fs-8 text-capitalize text-white">friendly support</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-action mt-4">
                                        <a href="#" class="btn btn-light white-btn white-btn-hover  text-capitalize w-100">Choose plan</a>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card border-0 h-100">
                                    <div class="price d-flex align-items-end">
                                        <span class="text-secondary fs-3">$200</span>
                                        <small class="ps-3">/month</small>
                                    </div>
                                    <div class="card-details">
                                        <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">Enterprise</h3>
                                        <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                        <ul class="mb-0 list-unstyled ps-0 pt-3">
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">web design</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">cms</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">hosting</p>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <i class="ti ti-check rounded-circle"></i>
                                                <p class="mb-0 fs-8 text-capitalize">Friendly Support</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-action">
                                        <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                    </div>
                                </div>    
                            </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                    <div class="row card-body bg-white">
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card border-0 h-100">
                                <div class="price d-flex align-items-end">
                                    <span class="text-secondary fs-3">$20</span>
                                    <small class="ps-3">/month</small>
                                </div>
                                <div class="card-details">
                                    <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">Intro</h3>
                                    <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                    <ul class="mb-0 list-unstyled ps-0 pt-3">
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">web design</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">cms</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action">
                                    <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card border-0 h-100">
                                <div class="price d-flex align-items-end">
                                    <span class="text-secondary fs-3">$50</span>
                                    <small class="ps-3">/month</small>
                                </div>
                                <div class="card-details">
                                    <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">base</h3>
                                    <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                    <ul class="mb-0 list-unstyled ps-0 pt-3">
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">web design</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">cms</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">hosting</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action">
                                    <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 px-3">
                            <div class="pro-plan bg-primary position-relative">
                                <span class="badge rounded-pill bg-white text-primary position-absolute text-uppercase fs-11">MOST POPULAR</span>
                                <div class="price d-flex align-items-end">
                                    <span class="text-white fw-bold fs-3">$100</span>
                                    <small class="ps-3 text-white">/month</small>
                                </div>
                                <div class="card-details position-relative">
                                    <h3 class="text-uppercase mb-0 text-secondary overflow-hidden text-white">pro</h3>
                                    <p class="mb-0 fs-8 ps-0 text-white">For most businesses that want to otpimize web queries</p>
                                    <ul class="mb-0 list-unstyled ps-0 pt-3">
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle text-white"></i>
                                            <p class="mb-0 fs-8 text-capitalize text-white">web design</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle text-white"></i>
                                            <p class="mb-0 fs-8 text-capitalize text-white">cms</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle text-white"></i>
                                            <p class="mb-0 fs-8 text-capitalize text-white">hosting</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle text-white"></i>
                                            <p class="mb-0 fs-8 text-capitalize text-white">friendly support</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action mt-4">
                                    <a href="#" class="btn btn-light white-btn white-btn-hover  text-capitalize w-100">Choose plan</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card border-0 h-100">
                                <div class="price d-flex align-items-end">
                                    <span class="text-secondary fs-3">$200</span>
                                    <small class="ps-3">/month</small>
                                </div>
                                <div class="card-details">
                                    <h3 class="text-uppercase mb-0 text-secondary overflow-hidden">Enterprise</h3>
                                    <p class="mb-0 fs-8 ps-0">For most businesses that want to otpimize web queries</p>
                                    <ul class="mb-0 list-unstyled ps-0 pt-3">
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">web design</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">cms</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">hosting</p>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <i class="ti ti-check rounded-circle"></i>
                                            <p class="mb-0 fs-8 text-capitalize">Friendly Support</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action">
                                    <a href="#" class="btn btn-light btn-hover-light text-capitalize w-100">Choose plan</a>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <img src="../assets/images/price-plan/Icon_Thorus Knot.png" class="position-absolute float-icon img-fluid">
              </div>
        </div>
    </section>
    <!------------------------------->
    <!-- Pricing Plans Section End -->
    <!------------------------------->    
    
    <!------------------------------>
    <!---- Contact Section Start --->
    <!------------------------------>
    <section class="contact position-relative">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-12">
                    <h5 class="fs-7 section-subheading text-uppercase fw-500">Contact us now</h5>
                    <div class="fs-2 section-heading text-uppercase fw-bold">
                        Have a<br> problem?<br> We are here<br> to help you
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-12">
                    <form>
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label  class="form-label text-uppercase fs-6 mb-3">Full Name</label>
                                    <input type="text" class="form-control border-0" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label  class="form-label text-uppercase mb-3">email</label>
                                    <input type="email" class="form-control border-0" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label  class="form-label text-uppercase fs-6 mb-3">phone</label>
                                    <input type="text" class="form-control border-0" placeholder="Enter your phone no">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label  class="form-label text-uppercase mb-3">subject</label>
                                    <select class="form-control border-0">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-12 col-12">
                                <div class="mb-xxl-4 mb-xl-4 mb-lg-4 mb-md-4 mb-sm-3 mb-3">
                                    <label  class="form-label text-uppercase mb-3">Message</label>
                                    <textarea class="form-control border-0" placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <!-- <div class="g-recaptcha" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>-->
                            </div> 
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-hover-secondery text-capitalize mt-2 w-100">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!------------------------------>
    <!-- Contact Section End  -->
    <!------------------------------>
    
    <!------------------------------>
    <!-- Footer Section Start  -->
    <!------------------------------>  
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="footer-logo-col">
                        <a href="#"><img src="../assets/images/Creato-logo.svg"></a>
                        <p class="copyrights fs-5 mb-0">Copyright @ <span id="autodate"></span></p>
                        <ul class="social-icons list-unstyled mb-0 pl-0 d-flex align-items-center">
                            <li><a href="#" class="rounded-circle"><img src="../assets/images/footer/icon_facebook.svg"><img src="../assets/images/footer/icon_facebook_white.svg"></a></li>
                            <li><a href="#" class="rounded-circle"><img src="../assets/images/footer/icon_twitter.svg"><img src="../assets/images/footer/icon_twitter_white.svg"></a></li>
                            <li><a href="#" class="rounded-circle"><img src="../assets/images/footer/icon_google_plus.svg"><img src="../assets/images/footer/icon_google_plus_white.svg"></a></li>
                            <li><a href="#" class="rounded-circle"><img src="../assets/images/footer/icon_linkdin.svg"><img src="../assets/images/footer/icon_linkdin_white.svg"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xxl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                    <h5 class="text-secondary fw-bold fs-4">Quick links</h5>
                    <ul class="list-unstyled mb-0 pl-0">
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">about us</a></li>
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">Features </a></li>
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">Team </a></li>
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">Portfolio </a></li>
                        <li><a href="#" class="text-capitalize fs-6 text-decoration-none">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-xxl-5 col-xxl-5 col-lg-5 col-md-8 col-sm-12 col-12">
                    <h5 class="text-secondary fw-bold fs-4">From the blog</h5>
                    <div class="blog mb-3">
                        <p class="mb-0 fs-6">It has survived not only centuries, that rela but also the all this among lea.</p>
                        <p class="mt-2 fs-6">16 Mar,2021</p>
                    </div>
                    <div class="blog mb-3">
                        <p class="mb-0 fs-6">It has survived not only centuries, that rela but also the all this among lea.</p>
                        <p class="mt-2 fs-6">16 Mar,2021</p>
                    </div>
                    <div class="blog">
                        <a href="#" class="text-decoration-none text-primary text-capitalize fs-6">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!------------------------------>
    <!-- Footer Section End  -->
    <!------------------------------>  
    

    <!------------------------------>
    <!----------- Js Libs ---------->
    <!------------------------------>
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/custom.js"></script>

</body>
</html>