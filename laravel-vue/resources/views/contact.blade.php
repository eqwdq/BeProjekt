<html>
<head>
    @include('header')
</head>
<body>
    <div class="page-heading">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li class="active">Contact</li>
							</ul>
							<h2>Contact Us</h2>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.header-area -->
		
		<div class="contact-area gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="location-card mb30 primary-shadow">
							<img src="images/contact/location.jpg" alt="location" />
							<div class="overlay"></div>
							<div class="location-info">
								<h6>Hall Of Fame</h6>
								<h4>49 West 32nd Street, New York</h4>
							</div>
							<span class="map-trigger">
								<i class="fa fa-map-marker"></i>
							</span>
							<div class="google-map-area">
								<div id="map" class="map"></div>
								<span class="map-close"><i class="fa fa-close"></i></span>
							</div>
						</div>
					</div><!-- /.col -->
					<div class="col-md-4">
						<div class="contact-info primary-shadow mb30 white-bg">
							<h4>Contact Info</h4>
							<div class="row">
								<div class="col-md-12 col-sm-6">
									<div class="single-contact-info">
										<div class="row">
											<div class="col-xs-5">
												<img src="images/contact/cp1.jpg" alt="contact" />
											</div>
											<div class="col-xs-7">
												<h6>Ruby Martin</h6>
												<span class="p-like">Organizer</span>
												<ul>
													<li>+02 596 355 32</li>
													<li>ruby@evemate.com</li>
												</ul>
											</div>
										</div>
									</div>
								</div><!-- /.col -->
								<div class="col-md-12 col-sm-6">
									<div class="single-contact-info">
										<div class="row">
											<div class="col-xs-5">
												<img src="images/contact/cp2.jpg" alt="contact" />
											</div>
											<div class="col-xs-7">
												<h6>Ella Robinson</h6>
												<span class="p-like">Planer</span>
												<ul>
													<li>+02 596 355 32</li>
													<li>ella@evemate.com</li>
												</ul>
											</div>
										</div>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
						</div><!-- /.contact-info -->
					</div><!-- /.col -->
				</div><!-- /.row -->
				</div>
                </div>
        @include('footer')
</body>
</html>