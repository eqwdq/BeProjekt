<!-- resources/views/footer.blade.php -->

<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-footer-widget">
                    <a href="index.html" class="footer-logo">
                        <img src="{{ asset('images/footer-logo.png') }}" alt="logo" />
                    </a>
                    <p>Evemat is a Responsive HTML Event Template based on material design language invented by google .</p>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                    </ul>
                </div>
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6">
                <div class="single-footer-widget">
                    <h4>SUBSCRIBE Me !</h4>
                    <form action="subscribe.php" class="subscription-form">
                        <input type="text" placeholder="Your Email" />
                        <input type="submit" value="go" />
                    </form>
                    <p>Your Information is safe to us .</p>
                </div>
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-12">
                <div class="single-footer-widget">
                    <h4>MINI Gallery</h4>
                    <ul class="gallery-list">
                        <li><img src="{{ asset('images/gallery/thumb/1.jpg') }}" alt="gallery" /></li>
                        <li><img src="{{ asset('images/gallery/thumb/2.jpg') }}" alt="gallery" /></li>
                        <li><img src="{{ asset('images/gallery/thumb/3.jpg') }}" alt="gallery" /></li>
                        <li><img src="{{ asset('images/gallery/thumb/4.jpg') }}" alt="gallery" /></li>
                        <li><img src="{{ asset('images/gallery/thumb/2.jpg') }}" alt="gallery" /></li>
                        <li><img src="{{ asset('images/gallery/thumb/1.jpg') }}" alt="gallery" /></li>
                    </ul>
                    <a href="#" class="more-image">More Images</a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.footer-area -->

<div class="footer-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>Copyright 2015 . Designed By <a href="#">BestPixels</a></span>
            </div>
        </div>
    </div>
</div><!-- /.footer-bar-area -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- jQuery Magnific-Popup
================================================== -->
<script src="{{ asset('lib/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>

<!-- Select2
================================================== -->
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

<!-- jQuery BxSlider
================================================== -->
<script src="{{ asset('lib/BxSlider/jquery.bxslider.min.js') }}"></script>

<!-- jQuery plyr
================================================== -->
<script src="{{ asset('lib/plyr/dist/plyr.js') }}"></script>

<!-- Google Map
================================================== -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- jQuery Custom
================================================== -->
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

</body>
</html>
