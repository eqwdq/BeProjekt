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

    <!-- Include Vite CSS and JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    <div id="app"></div>

    <!-- Load your Vue application JavaScript bundle -->
    @vite('resources/js/app.js')
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- jQuery Magnific-Popup -->
    <script src="{{ asset('lib/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

    <!-- jQuery BxSlider -->
    <script src="{{ asset('lib/BxSlider/jquery.bxslider.min.js') }}"></script>

    <!-- jQuery plyr -->
    <script src="{{ asset('lib/plyr/dist/plyr.js') }}"></script>

    <!-- Google Map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- jQuery Custom -->
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</body>
</html>
