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
        <link href="<?php echo base_url(); ?>css/style-red.css" rel="stylesheet" type="text/css" media="screen">

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
                    <a class="navbar-brand" href="index"><img src="<?php echo base_url(); ?>img/TEDx_logo.png" alt="TEDx"></a>

                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url(); ?>home/index">Home</a>
                        </li>
                        <!--menu Portfolio li end here-->
                        <li>
                            <a href="<?php echo base_url(); ?>forum/index">Forum</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>events/index">Evenementen</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url(); ?>nieuws/index">Nieuws</a>
                        </li>
                        <!--dit enkel laten zien als een admin is ingelogd-->
                        <?php
                        if ($this->session->has_userdata('user') && $this->session->has_userdata('logged_in') && $this->session->logged_in && $this->session->has_userdata('rolID') && $this->session->userdata['rolID'] == 1) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li><a href="<?php echo base_url(); ?>admin/gebruikerOverzicht">Gebruikers</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/evenementOverzicht">Evenementen</a></li><!--doorsturen naar pagina om de evenementen te beheren-->
                                </ul>
                            </li>

                        <?php } ?>

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
                                        <form role="form" action='<?php echo base_url(); ?>login/index' method='post'>
                                            <h4 class="center-heading">Afmelden</h4>
                                            <input type="submit" class="btn btn-theme-bg center-block" name="btn-logoff" value="Afmelden"/>
                                        </form>

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
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Contacteer ons</h4>
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
                    <h3 class="heading">Contacteer ons</h3>
                    <p>
                        U kan ons contacteren via het e-mailadres pxltedx@gmail.com of door het onderstaande formulier in te vullen.
                    </p>
                    <div class="divide30"></div>
                    <div class="form-contact">
                        {melding}
                        {naamError}
                        {emailError}
                        {onderwerpError}
                        {berichtError}
                        {captchaError}
                        <div class="required">
                            <p>( <span>*</span> velden zijn vereist )</p>
                        </div>
                        <?php echo form_open("home/contact"); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                        <label>Naam<span>*</span></label>
                                        <input type="text" class="form-control" name="naam" placeholder="Naam" id="naam" value="{naam}">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                        <label>E-mailadres<span>*</span></label>
                                        <input type="text" class="form-control" name="email" placeholder="E-mailadres" id="email" value="{email}">
                                        <p class="help-block"></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Onderwerp<span>*</span></label>
                                <input type="text" class="form-control" name="onderwerp" placeholder="Onderwerp" id="onderwerp" value="{onderwerp}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Bericht<span>*</span></label>
                                <textarea rows="5" class="form-control" name="bericht" placeholder="Bericht" id="bericht">{bericht}</textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>  
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                {captcha}
                            </div>
                        </div> 
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Geef de tekst uit de afbeelding hieronder in.<span>*</span></label>
                                <input type="text" class="form-control" name="captchaText" placeholder="Captcha" id="captchaText" value="{captchaText}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="submit" name="contactBtn" class="btn btn-theme-bg btn-lg" value="Verstuur Bericht" />
                            </div>
                        </div>
                        <?php form_close(); ?>
                    </div><!--contact form-->
                </div>
                <div class="col-md-4">
                    <h3 class="heading">Contact info</h3>
                    <ul class="list-unstyled contact contact-info">
                        <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> Elfde-Liniestraat 24, 3500 Hasselt, België</p></li> 
                        <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="home/contact">pxltedx@gmail.com</a></p></li>
                        <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong>+32 474 21 21 25</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="divide40"></div>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-1 margin30">
                        <div class="footer-col">
                            <h3>Over TEDx</h3>
                            <p>
                                TEDxPXL is een onafhankelijk georganiseerd TED conferentie waar sprekers uit de hele wereld hun cutting-edge ideeën kunnen delen.
                            </p>
                            <ul class="list-inline social-1">
                                <li><a href="https://www.facebook.com/TEDxEvents?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/tedx"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/+TEDx"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.pinterest.com/tednews/"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>                        
                    </div><!--footer col-->
                    <div class="col-md-4 col-sm-6 col-md-offset-3 margin30">
                        <div class="footer-col">
                            <h3>Contact</h3>

                            <ul class="list-unstyled contact">
                                <li><p><strong><i class="fa fa-map-marker"></i> Adres:</strong> Elfde-Liniestraat 24, 3500 Hasselt, België</p></li> 
                                <li><p><strong><i class="fa fa-envelope"></i> Mail Ons:</strong> <a href="index/contact">pxltedx@gmail.com</a></p></li>
                                <li> <p><strong><i class="fa fa-phone"></i> Telefoon:</strong>+32 474 21 21 25</p></li>

                            </ul>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-btm">
                            <span>&copy;2014. Theme by Jarno, Stef, Koen, Piet, Frederik</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--default footer end here-->
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>        
        <!--bootstrap js plugin-->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.sticky.js"></script>
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
        <!--owl carousel slider-->
        <script src="<?php echo base_url(); ?>js/owl.carousel.min.js" type="text/javascript"></script>
        <!--popup js-->
        <script src="<?php echo base_url(); ?>js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <!--you tube player-->
        <script src="<?php echo base_url(); ?>js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>


        <!--customizable plugin edit according to your needs-->
        <script src="<?php echo base_url(); ?>js/custom.js" type="text/javascript"></script>


        <!--cantact form script-->
        <!--<script src="<?php echo base_url(); ?>js/contact_me.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url(); ?>js/jqBootstrapValidation.js" type="text/javascript"></script>
        <!--gmap js-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript">
            var myLatlng;
            var map;
            var marker;

            function initialize() {
                myLatlng = new google.maps.LatLng(50.93773, 5.34914);

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

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </body>
</html>
