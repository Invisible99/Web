<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css-->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="screen">

        <!-- font awesome for icons -->
        <link href="<?php echo base_url(); ?>font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- flex slider css -->
        <link href="<?php echo base_url(); ?>css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <!-- animated css  -->
        <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet" type="text/css" media="screen"> 
        <!--Revolution slider css-->
        <link href="<?php echo base_url(); ?>rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen">
        <link href="<?php echo base_url(); ?>css/rev-style.css" rel="stylesheet" type="text/css" media="screen">
        <!--google fonts-->


        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--owl carousel css-->
        <link href="<?php echo base_url(); ?>css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="<?php echo base_url(); ?>css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="<?php echo base_url(); ?>css/yamm.css" rel="stylesheet" type="text/css">
        <!--popups css-->
        <link href="<?php echo base_url(); ?>css/magnific-popup.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--navigation -->
        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>home/index"><img src="<?php echo base_url(); ?>img/logo.png" alt="ASSAN"></a>

                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active ">
                            <a href="<?php echo base_url(); ?>home/index">Home</a>
                        </li>
                        <!--menu Portfolio li end here-->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>forum/index">Forum</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>events/index">Evenementen</a>
                        </li> 
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>nieuws/index">Nieuws</a>
                        </li>
                        <li class="dropdown " data-animate="animated fadeInUp" style="z-index:500;">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-search"></i></a>
                            <ul class="dropdown-menu search-dropdown animated fadeInUp">
                                <li id="dropdownForm">
                                    <div class="dropdown-form">
                                        <form class=" form-inline">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="search...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-theme-bg" type="button">Go!</button>
                                                </span>
                                            </div><!--input group-->
                                        </form><!--form-->
                                    </div><!--.dropdown form-->
                                </li><!--.drop form search-->
                            </ul><!--.drop menu-->
                        </li> <!--menu search li end here--> 
                        <li class="dropdown">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock"></i></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
                                <form role="form" action='<?php echo base_url(); ?>login/index' method='post'>
                                    <?php
                                    if (!($this->session->has_userdata('user') && $this->session->has_userdata('logged_in') && $this->session->logged_in && $this->session->has_userdata('rolID'))) {
                                        ?>
                                        <h4>Aanmelden</h4>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="gebruikersnaam" placeholder="Username"  required="required">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="password" class="form-control"  name="password" placeholder="Password"  required="required">
                                            </div>
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox"> Onthoud mij
                                                </label>
                                            </div>                                   
                                            <input type="submit" class="btn btn-theme-bg pull-right" name="btn-inlog" value="Aanmelden"/>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <p>Nog geen lid! <a href="<?php echo base_url(); ?>login/register">Registereer nu!</a></p>
                                        </div>
                                        <?php
                                    } else {
                                        ?>                                      
                                        <h4>Afmelden</h4>

                                        <input type="submit" class="btn btn-theme-bg" name="btn-logoff" value="Afmelden"/>

                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </li> <!--menu login li end here-->
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--container-->
        </div><!--navbar-default-->
        <!--rev slider start-->
        <div class="fullwidthbanner">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Powerful Theme">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url(); ?>img/bg-3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="caption title-2 sft"
                             data-x="50"
                             data-y="160"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            Powerful multi-purpose <br>
                            business template
                        </div>

                        <div class="caption text sfl"
                             data-x="50"
                             data-y="310"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.  <br>
                            lectus. Cras porta nisl at tincidunt tincidunt.  
                        </div>
                        <div class="caption sfb rev-buttons tp-resizeme"
                             data-x="50"
                             data-y="380"
                             data-speed="500"
                             data-start="1800"
                             data-easing="Sine.easeOut">
                            <a href="#" class="btn btn-theme-bg btn-lg">Purchase Now</a>
                        </div>

                        <div class="caption sfb rev-buttons tp-resizeme"
                             data-x="250"
                             data-y="380"
                             data-speed="500"
                             data-start="2100"
                             data-easing="Sine.easeOut">
                            <a href="#" class="btn border-white btn-lg">View features</a>
                        </div>

                    </li>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Unique Theme">
                        <!-- MAIN IMAGE -->
                        <img src="img/bg-4.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">




                        <div class="caption text-center-top sft"
                             data-x="center"
                             data-y="210"
                             data-speed="1000"
                             data-start="1400"
                             data-easing="easeOutExpo">
                            Feel the difference
                        </div>

                        <div class="caption text-center-btm sfr text-center"
                             data-x="center"
                             data-y="285"
                             data-speed="1000"
                             data-start="1600"
                             data-easing="easeOutExpo">

                            Assan is a creative multipurpose theme, you can use it for<br>  business, corporate, portfolio, shop events, personal and more...

                        </div>
                        <div class="caption sfb rev-buttons tp-resizeme"
                             data-x="center"
                             data-y="380"
                             data-speed="500"
                             data-start="1800"
                             data-easing="Sine.easeOut">
                            <a href="#" class="btn border-white btn-lg">View features</a>
                        </div>
                    </li>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Multipurpose">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url(); ?>img/bg-1.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYER NR. 1 -->
                        <div class="caption left-tile-text sfr tp-resizeme"
                             data-x="40"
                             data-y="110" 
                             data-speed="600"
                             data-start="1200"
                             data-end="9400"
                             data-endspeed="600">Unlimited layouts
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="caption medium_bg_darkblue sfl medium tp-resizeme"
                             data-x="40"
                             data-y="170" 
                             data-speed="600"
                             data-start="1600"
                             data-end="9400"
                             data-endspeed="600"><i class="fa fa-check"></i>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="caption modern_big_redbg sfb medium tp-resizeme"
                             data-x="90"
                             data-y="170" 
                             data-speed="600"
                             data-start="1600"
                             data-end="9400"
                             data-endspeed="600">Fully Responsive
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="caption medium_bg_darkblue sfl medium tp-resizeme"
                             data-x="40"
                             data-y="220" 
                             data-speed="600"
                             data-start="1800"
                             data-end="9400"
                             data-endspeed="600"><i class="fa fa-check"></i>
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="caption modern_big_redbg sfb medium tp-resizeme"
                             data-x="90"
                             data-y="220" 
                             data-speed="600"
                             data-start="1800"
                             data-end="9400"
                             data-endspeed="600">80+ HTML5 Valid Pages
                        </div>

                        <!-- LAYER NR. 6 -->
                        <div class="caption medium_bg_darkblue sfl medium tp-resizeme"
                             data-x="40"
                             data-y="270" 
                             data-speed="600"
                             data-start="2000"
                             data-end="9400"
                             data-endspeed="600"><i class="fa fa-check"></i>
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="caption modern_big_redbg sfb medium tp-resizeme"
                             data-x="90"
                             data-y="270" 
                             data-speed="600"
                             data-start="2000"
                             data-end="9400"
                             data-endspeed="600">Slider revolution
                        </div>

                        <!-- LAYER NR. 8 -->
                        <div class="caption medium_bg_darkblue sfl medium tp-resizeme"
                             data-x="40"
                             data-y="320" 
                             data-speed="600"
                             data-start="2200"
                             data-end="9400"
                             data-endspeed="600"><i class="fa fa-check"></i>
                        </div>

                        <!-- LAYER NR. 9 -->
                        <div class="caption modern_big_redbg sfb medium tp-resizeme"
                             data-x="90"
                             data-y="320" 
                             data-speed="600"
                             data-start="2200"
                             data-end="9400"
                             data-endspeed="600">Clean & Commented Code
                        </div>

                        <!-- LAYER NR. 10 -->
                        <div class="caption modern_big_redbg sfb medium tp-resizeme"
                             data-x="40"
                             data-y="370" 
                             data-speed="600"
                             data-start="2400"
                             data-end="9400"
                             data-endspeed="600">And Much More...
                        </div>

                    </li>
                </ul>
            </div>
        </div><!--full width banner-->
        <!--revolution end-->

        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="center-heading">
                        <h2><strong>What</strong> we do</h2>
                        <span class="center-line"></span>
                        <p class="sub-text margin40">
                            We want to present you a simple and functional template “ASSAN”. It is a powerful Multi-Purpose HTML 5 Template. Build whatever you like with this Template that looks effortlessly on-point in Business </p>
                    </div>
                </div>

            </div><!--center heading end-->
            <div class="divide50"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 margin30">
                    <div class="colored-boxed green">
                        <i class="fa fa-cogs"></i>
                        <h3>Free support & updates</h3>
                        <span class="center-line"></span>
                        <p>
                            Nullam vulputate lorem ut leo. Sed volutpat. Etiam non pede. Nullam et mauris. 
                        </p>
                    </div>
                </div><!--colored boxed col end-->
                <div class="col-md-3 col-sm-6 margin30">
                    <div class="colored-boxed dark">
                        <i class="fa fa-tablet"></i>
                        <h3>Ultra responsive</h3>
                        <span class="center-line"></span>
                        <p>
                            Nullam vulputate lorem ut leo. Sed volutpat. Etiam non pede. Nullam et mauris. 
                        </p>
                    </div>
                </div><!--colored boxed col end-->
                <div class="col-md-3 col-sm-6 margin30">
                    <div class="colored-boxed blue">
                        <i class="fa fa-heart"></i>
                        <h3>made with love</h3>
                        <span class="center-line"></span>
                        <p>
                            Nullam vulputate lorem ut leo. Sed volutpat. Etiam non pede. Nullam et mauris. 
                        </p>
                    </div>
                </div><!--colored boxed col end-->
                <div class="col-md-3 col-sm-6 margin30">
                    <div class="colored-boxed red">
                        <i class="fa fa-sliders"></i>
                        <h3>Premium plugins</h3>
                        <span class="center-line"></span>
                        <p>
                            Nullam vulputate lorem ut leo. Sed volutpat. Etiam non pede. Nullam et mauris. 
                        </p>
                    </div>
                </div><!--colored boxed col end-->
            </div>
        </div><!--services container-->

        <div class="divide80"></div>
        <div class="full-width"> 
            <div class="cotnainer">
                <div class="center-heading">
                    <h2>Recent <strong>projects</strong></h2>
                    <span class="center-line"></span>
                </div>
            </div>
            <ul class="filter list-inline">
                <li><a class="active" href="#" data-filter="*">Show All</a></li>
                <li><a href="#" data-filter=".photography">Photography</a></li>
                <li><a href="#" data-filter=".illustration">illustration</a></li>
                <li><a href="#" data-filter=".branding">branding</a></li>
                <li><a href="#" data-filter=".web-design">web design</a></li>
            </ul>

            <div class="portfolio-box iso-call col-4-no-space">

                <div class="project-post photography branding">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-1.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-1.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->

                </div><!--project post-->
                <div class="project-post illustration web-design">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-2.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-2.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->

                <div class="project-post illustration web-design">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-3.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-3.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->
                <div class="project-post photography web-design">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-4.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-4.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->

                <div class="project-post branding">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-5.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-5.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->
                <div class="project-post  illustration">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-6.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-6.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->

                <div class="project-post  branding">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-7.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-7.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->


                <div class="project-post   web-design">
                    <div class="img-icon">
                        <img src="<?php echo base_url(); ?>img/img-8.jpg" class="img-responsive" alt="">
                        <div class="img-icon-overlay">
                            <p>
                                <a href="<?php echo base_url(); ?>img/img-8.jpg" class="show-image"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-sliders"></i></a>
                            </p>
                        </div>
                    </div> <!--img-icon-->
                </div><!--project post-->

            </div>
        </div><!--full width-->
        <div class="divide50"></div>
        <div class="text-center">
            <a href="masonry-portfolio-4.html" class="btn btn-theme-dark btn-lg">View All Work</a>
        </div>
        <div class="divide50"></div>
        <div class="wide-img-showcase">

            <div class="row margin-0 wide-img-showcase-row">
                <div class="col-sm-6 no-padding  img-2 ">
                    <div class="no-padding-inner ">
                        <div>&nbsp;</div>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-6 no-padding gray">
                    <div class="no-padding-inner gray">
                        <h3 class="wow animated fadeInDownfadeInRight">Core features of <span class="colored-text">assan</span></h3>
                        <div class="services-box margin30 wow animated fadeInRight">
                            <div class="services-box-icon">
                                <i class="fa fa-tablet"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Fully Responsive</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--service box-->
                        <div class="services-box margin30 wow animated fadeInRight">
                            <div class="services-box-icon">
                                <i class="fa fa-twitter"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>bootstrap 3.3.4</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--service box-->

                        <div class="services-box margin30 wow animated fadeInRight">
                            <div class="services-box-icon">
                                <i class="fa fa-code"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>80+ valid HTML5 Pages and much more...</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                            <div class="divide30"></div>
                            <p><a href="#" class="btn btn-theme-dark btn-lg">Purchase Now</a></p>
                        </div><!--service box-->

                    </div>
                </div>
            </div>
        </div><!--wide image showcase end-->
        <section class="fun-fact-wrap fun-facts-bg">
            <div class="container">               
                <div class="row">
                    <div class="col-md-3 margin20 facts-in">
                        <h3><span class="counter">1000</span> +</h3>
                        <h4>Downloads</h4>
                    </div><!--facts in-->
                    <div class="col-md-3 margin20 facts-in">
                        <h3><span class="counter">2300</span></h3>
                        <h4>Happy Customers</h4>
                    </div><!--facts in-->
                    <div class="col-md-3 margin20 facts-in">
                        <h3><span class="counter">80</span> +</h3>
                        <h4>Valid layouts </h4>
                    </div><!--facts in-->
                    <div class="col-md-3 margin20 facts-in">
                        <h3><span class="counter">3000</span></h3>
                        <h4>Cups of tea</h4>
                    </div><!--facts in-->
                </div>
            </div>
        </section><!--fun facts-->
        <div class="testimonials-v-2 wow animated fadeInUp" data-wow-duration="700ms" data-wow-delay="100ms">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="center-heading">
                            <h2><strong>What</strong> Client’s Say</h2>
                            <p>1000+ Worldwide customers  use Assan template.</p>
                            <span class="center-line"></span>

                        </div>
                    </div>
                </div><!--center heading end-->

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="testi-slide">
                            <ul class="slides">
                                <li>
                                    <img src="<?php echo base_url(); ?>img/customer-1.jpg" alt="">
                                    <p>
                                        <i class="ion-quote"></i>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.
                                    </p>
                                    <h4 class="test-author">
                                        Rick man - <em>rock inc</em>
                                    </h4>
                                </li><!--testi item-->
                                <li>
                                    <img src="img/customer-2.jpg" alt="">
                                    <p>
                                        <i class="ion-quote"></i>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years </p>
                                    <h4 class="test-author">
                                        Jellia - <em>Founder of tinka inc</em>
                                    </h4>
                                </li><!--testi item-->
                                <li>
                                    <img src="img/customer-3.jpg" alt="">
                                    <p>
                                        <i class="ion-quote"></i>
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor.</p>
                                    <h4 class="test-author">
                                        Smith - <em>Ceo, company inc.</em>
                                    </h4>
                                </li><!--testi item-->
                            </ul>
                        </div><!--flex slider testimonials end here-->
                    </div>
                </div><!--testi slider row end-->

            </div>
        </div><!--testimonials v-2 end-->
        <div class="blue-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 margin30">
                        <div class="services-box wow animated fadeInDown">
                            <div class="services-box-icon">
                                <i class="fa fa-bars"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>80+ valid layouts</h4>
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</div>
                        </div><!--service box-->
                    </div>
                    <div class="col-sm-6 ">
                        <div class="services-box wow animated fadeInUp">
                            <div class="services-box-icon">
                                <i class="fa fa-download"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Free Support & Updates</h4>
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor. </div>
                        </div><!--service box-->
                    </div>
                </div>
            </div>
        </div><!--full wide 2 columns content end-->
        <div class="divide70"></div>
        <div class="assan-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <h2>Awesome <strong>features</strong></h2>
                            <span class="center-line"></span>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="100ms">
                            <div class="services-box-icon">
                                <i class="fa fa-image"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Sliders</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--services box-->
                    </div><!--services col-->
                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="200ms">
                            <div class="services-box-icon">
                                <i class="fa fa-envelope"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Advanced Forms</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--services box-->
                    </div><!--services col-->
                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="300ms">
                            <div class="services-box-icon">
                                <i class="fa fa-users"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Customer Support</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--services box-->
                    </div><!--services col-->

                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="400ms">
                            <div class="services-box-icon">
                                <i class="fa fa-crop"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Pixel perfect design</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--services box-->
                    </div><!--services col-->
                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="500ms">
                            <div class="services-box-icon">
                                <i class="fa fa-twitter"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>bootstrap 3.3.4</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.
                                </p>
                            </div>
                        </div><!--services box-->
                    </div><!--services col-->
                    <div class="col-md-4 col-sm-6 margin20">
                        <div class="services-box wow animated fadeIn" data-wow-duration="700ms" data-wow-delay="600ms">
                            <div class="services-box-icon">
                                <i class="fa fa-flag"></i>
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Font Awesome icons</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing metus. elit. Quisque rutrum pellentesque imperdiet.

                                </p>

                            </div>
                        </div><!--services box-->
                    </div><!--services col-->
                </div><!--services row-->
            </div>
        </div><!--assan features-->
        <div class="divide40"></div>
        <div class="our-team-v-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <h2>Assan <strong>Team</strong></h2>
                            <span class="center-line"></span>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <div class="person-v2">
                            <img src="<?php echo base_url(); ?>img/team-5.jpg" class="img-responsive" alt="">
                            <div class="person-desc-v2">
                                <h3>Steve Smith</h3>
                                <em>Creative Designer</em>
                                <ul class="list-inline top-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div><!--person col end-->
                    <div class="col-sm-3 text-center">
                        <div class="person-v2">
                            <img src="<?php echo base_url(); ?>img/team-6.jpg" class="img-responsive" alt="">
                            <div class="person-desc-v2">
                                <h3>Steve Smith</h3>
                                <em>Creative Designer</em>
                                <ul class="list-inline top-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div><!--person col end-->
                    <div class="col-sm-3 text-center">
                        <div class="person-v2">
                            <img src="<?php echo base_url(); ?>img/team-7.jpg" class="img-responsive" alt="">
                            <div class="person-desc-v2">
                                <h3>Steve Smith</h3>
                                <em>Creative Designer</em>
                                <ul class="list-inline top-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div><!--person col end-->
                    <div class="col-sm-3 text-center">
                        <div class="person-v2">
                            <img src="<?php echo base_url(); ?>img/team-8.jpg" class="img-responsive" alt="">
                            <div class="person-desc-v2">
                                <h3>Steve Smith</h3>
                                <em>Creative Designer</em>
                                <ul class="list-inline top-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div><!--person col end-->
                </div>
            </div>
        </div><!--our team v-2-->
        <div class="divide70"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="center-heading">
                        <h2><strong>latest</strong> news</h2>
                        <span class="center-line"></span>
                    </div>
                </div>                   
            </div>
            <div class="row">
                <div class="col-sm-4 margin30">
                    <div>
                        <a href="#">
                            <div class="item-img-wrap">
                                <img src="<?php echo base_url(); ?>img/img-8.jpg" class="img-responsive" alt="workimg">
                                <div class="item-img-overlay">
                                    <span></span>
                                </div>
                            </div>                       
                        </a><!--news link--> 
                        <div class="news-desc">
                            <span>Sports</span>
                            <h4><a href="#">Lorem ipsum dollor Sit amet</a></h4>
                            <span>By <a href="#">Author</a> on 24 july 2014</span> <span><a href="#">Read more...</a></span>
                        </div><!--news desc-->
                    </div> 
                </div><!--news col-->
                <div class="col-sm-4 margin30">
                    <div>
                        <a href="#">
                            <div class="item-img-wrap">
                                <img src="<?php echo base_url(); ?>img/img-3.jpg" class="img-responsive" alt="workimg">
                                <div class="item-img-overlay">
                                    <span></span>
                                </div>
                            </div>                       
                        </a><!--news link--> 
                        <div class="news-desc">
                            <span>Sports</span>
                            <h4><a href="#">Lorem ipsum dollor Sit amet</a></h4>
                            <span>By <a href="#">Author</a> on 24 july 2014</span> <span><a href="#">Read more...</a></span>
                        </div><!--news desc-->
                    </div> 
                </div><!--news col-->
                <div class="col-sm-4 margin30">
                    <div>
                        <a href="#">
                            <div class="item-img-wrap">
                                <img src="img/img-6.jpg" class="img-responsive" alt="workimg">
                                <div class="item-img-overlay">
                                    <span></span>
                                </div>
                            </div>                       
                        </a><!--news link--> 
                        <div class="news-desc">
                            <span>Sports</span>
                            <h4><a href="#">Lorem ipsum dollor Sit amet</a></h4>
                            <span>By <a href="#">Author</a> on 24 july 2014</span> <span><a href="#">Read more...</a></span>
                        </div><!--news desc-->
                    </div> 
                </div><!--news col-->
            </div>
        </div><!--latest news-->

        <div class="divide40"></div>
        <div class="intro-text-1 light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="animated slideInDown">Assan is Simply creative Template
                        </h4>

                        <p>
                            Clean & powerful Easy to use multipurpose business HTML5 template.
                        </p>                   
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="btn border-theme btn-lg">Purchase now</a>
                    </div>
                </div>
            </div>
        </div> <!--intro text end-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 margin30">
                        <div class="footer-col">
                            <h3>About assan</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
                            </p>
                            <ul class="list-inline social-1">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>                        
                    </div><!--footer col-->
                    <div class="col-md-3 col-sm-6 margin30">
                        <div class="footer-col">
                            <h3>Contact</h3>

                            <ul class="list-unstyled contact">
                                <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> Elfde-Liniestraat 24, B-3500 Hasselt</p></li> 
                                <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="home/contact">pxltedx@gmail.com</a></p></li>
                                <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong>+32 474 21 21 25</p></li>
                            </ul>
                        </div>                        
                    </div><!--footer col-->
                    <div class="col-md-3 col-sm-6 margin30">
                        <div class="footer-col">
                            <h3>Featured Work</h3>
                            <ul class="list-inline f2-work">
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-1.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-2.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-3.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-4.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-5.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-6.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-7.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-8.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="<?php echo base_url(); ?>img/img-9.jpg" class="img-responsive" alt=""></a></li>
                            </ul>
                        </div>                        
                    </div><!--footer col-->
                    <div class="col-md-3 col-sm-6 margin30">
                        <div class="footer-col">
                            <h3>Newsletter</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, 
                            </p>
                            <form role="form" class="subscribe-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter email to subscribe">
                                    <span class="input-group-btn">
                                        <button class="btn  btn-theme-dark btn-lg" type="submit">Ok</button>
                                    </span>
                                </div>
                            </form>
                        </div>                        
                    </div><!--footer col-->

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-btm">
                            <span>&copy;2014. Theme by Jarno</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--default footer end here-->
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-migrate.min.js"></script> 
        <!--bootstrap js plugin-->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="<?php echo base_url(); ?>text/javascript" src="js/jquery.sticky.js"></script>
        <!--flex slider plugin-->
        <script src="<?php echo base_url(); ?>js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--parallax background plugin-->
        <script src="<?php echo base_url(); ?>js/jquery.stellar.min.js" type="text/javascript"></script>
        <!--digit countdown plugin-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!--digit countdown plugin-->
        <script src="<?php echo base_url(); ?>js/jquery.counterup.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="<?php echo base_url(); ?>js/wow.min.js" type="text/javascript"></script> 

        <script src="<?php echo base_url(); ?>js/jquery.isotope.min.js" type="text/javascript"></script>
        <!--image loads plugin -->
        <script src="<?php echo base_url(); ?>js/jquery.imagesloaded.min.js" type="text/javascript"></script>
        <!--owl carousel slider-->
        <script src="<?php echo base_url(); ?>js/owl.carousel.min.js" type="text/javascript"></script>
        <!--popup js-->
        <script src="<?php echo base_url(); ?>js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <!--you tube player-->
        <script src="<?php echo base_url(); ?>js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>        
        <!--customizable plugin edit according to your needs-->
        <script src="<?php echo base_url(); ?>js/custom.js" type="text/javascript"></script>

        <!--revolution slider plugins-->
        <script src="<?php echo base_url(); ?>rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/revolution-custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/isotope-custom.js" type="text/javascript"></script>
    </body>
</html>
