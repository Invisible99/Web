<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact us</title>

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
                    <a class="navbar-brand" href="index"><img src="<?php echo base_url(); ?>img/logo.png" alt="ASSAN"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active ">
                            <a href="index">Home</a>
                        </li>
                        <!--menu home li end here-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown">Portfolio <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu multi-level" role="menu">
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Grid Text Boxed </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-2.html"> 2 Columns</a></li>
                                        <li><a href="portfolio-3.html"> 3 Columns</a></li>
                                        <li><a href="portfolio-4.html"> 4 Columns</a></li>                         

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Grid Boxed </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="grid-portfolio-2-no-text.html">2 Columns</a></li>
                                        <li><a href="grid-portfolio-3-no-text.html">3 Columns</a></li>
                                        <li><a href="grid-portfolio-4-no-text.html">4 Columns</a></li>                         

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">No space Full width </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-full-width-2.html">2 columns</a></li>
                                        <li><a href="portfolio-full-width-3.html">3 columns</a></li>
                                        <li><a href="portfolio-full-width-4.html">4 columns</a></li>                         
                                        <li><a href="portfolio-full-width-5.html">5 columns</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">No Space Boxed </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-no-space-bx-2.html"> 2 Columns</a></li>
                                        <li><a href="portfolio-no-space-bx-3.html"> 3 Columns</a></li>
                                        <li><a href="portfolio-no-space-bx-4.html"> 4 Columns</a></li>                         

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Portfolio Masonry </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="masonry-portfolio-3.html"> 3 Columns</a></li>
                                        <li><a href="masonry-portfolio-4.html"> 4 Columns</a></li>
                                        <li><a href="masonry-portfolio-full.html"> Full Width</a></li>                         

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Portfolio Items</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="portfolio-single.html">Single item</a></li>
                                        <li><a href="portfolio-single-2.html">Single item 2</a></li>                                                             
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <!--menu Portfolio li end here-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="blog-full.html">Blog - full width</a></li>
                                <li><a href="blog-leftimg.html">Blog - left image</a></li>
                                <li><a href="blog-sidebar.html">Blog - sidebar</a></li>
                                <li><a href="blog-2col.html">Blog - 2 column</a></li>
                                <li><a href="blog-timeline.html">Blog - Timeline</a></li>
                                <li><a href="blog-masonary.html">Blog - Masonry</a></li>
                                <li><a href="blog-single.html">Blog - Single</a></li>
                            </ul>
                        </li>
                        <!--menu blog li end here-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="me.html">About - Me</a></li>

                                <li><a href="services.html">Services</a></li>
                                <li><a href="team">Our Team</a></li>
                                <li><a href="pricing.html">Our Pricing</a></li>                                
                                <li><a href="faq.html">FAQS</a></li> 
                                <li><a href="email-template.html">Email Template</a></li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Contact </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="contact.html"> Contact default</a></li>
                                        <li><a href="contact-advanced.php">Contact advanced</a></li>
                                        <li><a href="contact-option.php">Contact option</a></li>
                                        <li><a href="contact-flat.php">Contact Flat</a></li>
                                    </ul>
                                </li>                                          
                                <li><a href="search-results.html">Search Results</a></li>                                
                                <li><a href="career.html">Career</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="process.html">Our Process</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="events">Events</a>
                        </li> 
                        <!--mega menu-->
                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features  <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <h3 class="heading">headers & Footers</h3>
                                                <ul class="nav mega-vertical-nav">        
                                                    <li><a href="index.html">Header 1 - Default</a></li>
                                                    <li><a href="header-dark.html">Header 2 - dark </a></li>
                                                    <li><a href="header-transparent.html">header 3 - transparent </a></li>
                                                    <li><a href="header-center-logo.html">header 4 - Logo center </a></li>

                                                    <li><a href="index.html">Footer - 1</a></li>
                                                    <li><a href="footer-2.html">Footer - 2</a></li>
                                                    <li><a href="footer-3.html">Footer - 3 </a></li>
                                                </ul>

                                            </div>
                                            <div class="col-sm-3">
                                                <h3 class="heading">Layout grids </h3>
                                                <ul class="nav mega-vertical-nav">
                                                    <li><a href="full-width.html">Full Width</a></li>                                                    
                                                    <li><a href="left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a href="right-sidebar.html">Right sidebar</a></li>
                                                    <li><a href="both-sidebar.html">Both Sidebar</a></li>
                                                    <li><a href="both-right-sidebar.html">Both Right sidebar</a></li>
                                                    <li><a href="both-left-sidebar.html">Both Left Sidebar</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 class="heading">Features</h3>
                                                <ul class="nav mega-vertical-nav">
                                                    <li><a href="typography.html">Typography</a></li>
                                                    <li><a href="element.html">Elements</a></li>                                                   
                                                    <li><a href="home-soon.html">Coming Soon</a></li>   
                                                    <li><a href="side-nav.html">side navigation </a></li> 
                                                    <li><a href="testimonials.html">testimonials </a></li> 
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 class="heading">MISCELLANEOUS</h3>
                                                <ul class="nav mega-vertical-nav">
                                                    <li><a href="maintenance-page.html">Maintenance page </a></li>
                                                    <li><a href="blank.html">Blank Page</a></li>
                                                    <li><a href="error.html">Error - 404</a></li>
                                                    <li><a href="login-ragister.html">Login / Register</a></li>
                                                    <li><a href="login-ragister-classic.html">Login / Register - Classic </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> <!--menu Features li end here-->
                        <!--mega menu end-->      

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
                                <form role="form">
                                    <h4>Signin</h4>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>
                                        <a class="btn btn-theme-bg pull-right" href="">Login</a>
                                        <!--                                        <button type="submit" class="btn btn-theme pull-right">Login</button>                 -->
                                        <div class="clearfix"></div>
                                        <hr>
                                        <p>Don't have an account! <a href="register">Register Now</a></p>
                                    </div>
                                </form>
                            </div>
                        </li> <!--menu login li end here-->
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--container-->
        </div><!--navbar-default-->
        
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Contact us</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li>Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide80"></div>
        <div class="container">
            <div id="map-canvas"></div>
        </div><!--.container-->
        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 margin30">
                    <h3 class="heading">Contact us</h3>
                    <p>
                        Duis vitae imperdiet ipsum. Vestibulum ullamcorper lorem at orci vulputate, volutpat tempus magna elementum. Nam in odio sem. Morbi in justo interdum massa tristique lobortis in quis diam. Etiam erat urna, cursus eu ante quis, aliquam venenatis augue. Cras turpis justo, pellentesque eu hendrerit et, euismod vitae leo. Ut in lorem lobortis, gravida quam eget, pulvinar quam. Nam ut leo leo.
                    </p>
                    <div class="divide30"></div>
                    <div class="form-contact">
                        <div class="required">
                            <p>( <span>*</span> fields are required )</p>
                        </div>

                       <form name="sentMessage" id="contactForm" method="post" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                            <p class="help-block"></p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12  controls">
                                    <label>Phone Number<span><!--*--></span></label>
                                    <input type="tel" class="form-control" placeholder="Phone Number" id="phone" >
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls">
                                    <label>Message<span>*</span></label>
                                    <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-theme-bg btn-lg">Send Message</button>
                                </div>
                            </div>
                        </form>

                    </div><!--contact form-->
                </div>
                <div class="col-md-4">
                    <h3 class="heading">Contact info</h3>
                    <ul class="list-unstyled contact contact-info">
                        <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> Elfde-Liniestraat 24, 3500 Hasselt, België</p></li> 
                        <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="#">pxltedx@gmail.com</a></p></li>
                        <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong>+32 474 21 21 25</p></li>
                    </ul>
                    <div class="divide40"></div>
                    <h4>Get social</h4>
                    <ul class="list-inline social-1">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="divide40"></div>
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
                                <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> vaisahali, jaipur, 302012</p></li> 
                                <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="#">pxltedx@gmail.com</a></p></li>
                                <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong>+32 474 21 21 25</p></li>

                            </ul>
                        </div>                        
                    </div><!--footer col-->
                    <div class="col-md-3 col-sm-6 margin30">
                        <div class="footer-col">
                            <h3>Featured Work</h3>
                            <ul class="list-inline f2-work">
                                <li><a href="portfolio-single.html"><img src="img/img-1.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-2.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-3.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-4.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-5.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-6.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-7.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-8.jpg" class="img-responsive" alt=""></a></li>
                                <li><a href="portfolio-single.html"><img src="img/img-9.jpg" class="img-responsive" alt=""></a></li>
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
                                        <a class="btn  btn-theme-dark btn-lg" href="">Ok</a>
<!--                                        <button class="btn  btn-theme-dark btn-lg" type="submit">Ok</button>-->
                                    </span>
                                </div>
                            </form>
                        </div>                        
                    </div><!--footer col-->

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-btm">
                            <span>&copy;2014. Theme by Design_mylife</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--default footer end here-->
       <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>        
        <!--bootstrap js plugin-->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <!--flex slider plugin-->
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--parallax background plugin-->
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
        
        
        <!--digit countdown plugin-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!--digit countdown plugin-->
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script> 
        <!--owl carousel slider-->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <!--popup js-->
        <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <!--you tube player-->
        <script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
        
        
        <!--customizable plugin edit according to your needs-->
        <script src="js/custom.js" type="text/javascript"></script>

        
        <!--cantact form script-->
        <script src="js/contact_me.js" type="text/javascript"></script>
        <script src="js/jqBootstrapValidation.js" type="text/javascript"></script>
        <!--gmap js-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript">
            var myLatlng;
            var map;
            var marker;

            function initialize() {
                myLatlng = new google.maps.LatLng(50.93773,5.34914);

                var mapOptions = {
                    zoom: 14,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    draggable: false
                };
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var contentString = '<p style="line-height: 20px;"><strong>PXL Hogeschool</strong></p><p>Elfde-Liniestraat 24<br/>3500 Hasselt, België</p>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Marker'
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </body>
</html>
