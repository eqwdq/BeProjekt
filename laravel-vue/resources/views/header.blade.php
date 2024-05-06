<!-- resources/views/header.blade.php -->

<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML Event Template">
    <meta name="author" content="bestpixels">
    
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.png') }}">
    <link href="{{ asset('images/ico/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('images/ico/favicon.ico') }}" rel="icon" type="image/x-icon">
    
    <!-- Site Title  -->
    <title>nConnect</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('lib/Magnific-Popup/dist/magnific-popup.css') }}"/>
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('lib/Font-Awesome/css/font-awesome.min.css') }}"/>
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('lib/select2/css/select2.min.css') }}"/>
    
    <!-- plyr CSS -->
    <link rel="stylesheet" href="{{ asset('lib/plyr/dist/plyr.css') }}"/>
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
    
</head>
<body>
    <div class="navigation-area primary-shadow">
        <div class="top-info-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contact-info-bar">
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Študentské centrum UKF, Dražovská 2, Nitra</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right mobile-left">
                        <div class="contact-info-bar">
                            <ul>
                                <li><i class="fa fa-phone"></i> +421 902 170 744</li>
                                <li><i class="fa fa-envelope"></i>  info@nconnect.sk</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.top-info-bar -->
    
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Site Logo" /></a>
                </div>

                <!-- Collect the nav links and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{ request()->is('/') ? 'current' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                        <li class="{{ request()->is('speakers') ? 'current' : '' }}"><a href="{{ url('speakers') }}">Speakers</a></li>
                        <li class="{{ request()->is('schedule') ? 'current' : '' }}"><a href="{{ url('schedule') }}">Schedule</a></li>
                        <li class="{{ request()->is('sponsors') ? 'current' : '' }}"><a href="{{ url('sponsors') }}">Sponsors</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('about') }}">About</a></li>
                                <li><a href="{{ url('accommodation') }}">Accommodation</a></li>
                                <li><a href="{{ url('gallery') }}">Gallery</a></li>
                                <li><a href="{{ url('price-table') }}">Price Table</a></li>
                                <li><a href="{{ url('blog') }}">Blog</a></li>
                                <li><a href="{{ url('blog-single') }}">Blog Single</a></li>
                                <li><a href="{{ url('404') }}">404 Error</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </div><!-- /.navigation-area -->
</body>

</html>

