<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Overzicht gebruikers</title>

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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>home/index"><img src="<?php echo base_url(); ?>img/logo.png" alt="TEDxPXL"></a>

                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown ">
                            <a href="<?php echo base_url(); ?>home/index">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>forum/index">Forum</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>events/index">Evenementen</a>
                        </li> 
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>nieuws/index">Nieuws</a>
                        </li>
                        <!--dit enkel laten zien als een admin is ingelogd-->
                        <li class="active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <!--<li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Gebruikers(5)</a> <!-- de 5 is het aantal users dat nog niet geactiveerd is
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Overzicht</a></li>
                                        <li><a href="home-revolution-boxed.html">Revolution Boxed</a></li>
                                        <li><a href="home-revolution-fullscreen.html">Revolution Fullscreen</a></li>
                                        <li><a href="ken-burns.html">Ken burns Slider</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="<?php echo base_url(); ?>admin/gebruikerOverzicht">Gebruikers ({aantalInactieveGebruikers} inactief)</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/evenementOverzicht">Evenementen</a></li><!--doorsturen naar pagina om de evenementen te beheren-->
                            </ul>
                        </li>
                        <!-- -->
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
        
        <!--revolution end-->     
        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <h2>Overzicht van alle niet actieve gebruikers</h2>
                    <table class="table table-striped table-bordered"> <tr> <th> RolID </th> <th> Username: </th> <th> E-mail: </th> <th> Voornaam: </th> <th> Familienaam: </th> </tr>

                        {inactieveGebruikers}
                        <tr><td>{rolID}</td> <td>{username}</td> <td>{email}</td> <td>{voornaam}</td> <td>{familienaam}</td>
                            <td> <a href="<?php echo base_url(); ?>admin/deleteGebruiker/{gebruikerID}" onclick="return confirm('Weet u zeker dat u {username} wil verwijderen?')"></i>Verwijderen</a></td>
                            <td> <a href="<?php echo base_url(); ?>admin/activeerGebruiker/{gebruikerID}" onclick="return confirm('Weet u zeker dat u {username} wil activeren?')">Activeren</a></td>
                            {/inactieveGebruikers}
                        </tr>        
                    </table>
                    {inactievemelding}

                    <h2>Overzicht van alle banned gebruikers</h2>
                    <table class="table table-striped table-bordered"> <tr> <th> RolID </th> <th> Username: </th> <th> E-mail: </th> <th> Voornaam: </th> <th> Familienaam: </th> </tr>

                        {bannedGebruikers}
                        <tr><td>{rolID}</td> <td>{username}</td> <td>{email}</td> <td>{voornaam}</td> <td>{familienaam}</td>
                            <td> <a href="<?php echo base_url(); ?>admin/unbanGebruiker/{gebruikerID}" onclick="return confirm('Weet u zeker dat u {username} wil unbannen?')"></i>Unbannen</a></td>
                            {/bannedGebruikers}
                        </tr>        
                    </table>
                    {bannedmelding}

                    <h2>Overzicht van alle geactiveerde gebruikers</h2>
                    <table class="table table-striped table-bordered"> <tr> <th> RolID </th> <th> Username: </th> <th> E-mail: </th> <th> Voornaam: </th> <th> Familienaam: </th> </tr>

                        {actieveGebruikers}
                        <tr><td>{rolID}</td> <td>{username}</td> <td>{email}</td> <td>{voornaam}</td> <td>{familienaam}</td>
                            <td> <a href="<?php echo base_url(); ?>admin/deactivateGebruiker/{gebruikerID}" onclick="return confirm('Weet u zeker dat u {username} wil verwijderen?')"></i>Verwijderen</a></td>
                            <td> <a href="<?php echo base_url(); ?>admin/banGebruiker/{gebruikerID}" onclick="return confirm('Weet u zeker dat u {username} wil bannen?')"></i>Bannen</a></td>
                            <td> <a href="<?php echo base_url(); ?>admin/bewerkGebruiker/{gebruikerID}">Bewerken</a></td>
                            {/actieveGebruikers}
                        </tr>                        
                    </table>
                    {actievemelding}

                </div>

            </div><!--center heading end-->
      
        </div><!--services container-->

        
        
        
        
        
        
        <div class="divide60"></div>
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
