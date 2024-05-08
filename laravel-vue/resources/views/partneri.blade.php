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
								<<li class="{{ request()->is('/') ? 'current' : '' }}"><a href="{{ url('/') }}">DOMOV</a></li>
								<li class="active">PARTNERI</li>
							</ul>
							<h2>PARTNERI</h2>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.header-area -->

    <div class="sponsors-area gray-bg page-section">
			<div class="container">
				
				
					<div role="tabpanel" class="tab-pane" id="GoldSponsors">
						<div class="row">
							<div class="col-md-3 col-sm-6 mb30">
								<div class="single-sponsor primary-shadow white-bg">
									<img src="images/sponsor/4.png" alt="sponsor" />
								</div>
							</div>
							<div class="col-md-3 col-sm-6 mb30">
								<div class="single-sponsor primary-shadow white-bg">
									<img src="images/sponsor/3.png" alt="sponsor" />
								</div>
							</div>
							<div class="col-md-3 col-sm-6 mb30">
								<div class="single-sponsor primary-shadow white-bg">
									<img src="images/sponsor/2.png" alt="sponsor" />
								</div>
							</div>
							<div class="col-md-3 col-sm-6 mb30">
								<div class="single-sponsor primary-shadow white-bg">
									<img src="images/sponsor/1.png" alt="sponsor" />
								</div>
							</div>
						</div>
					</div><!-- /.tabpanel -->
					
				</div><!-- /.tab-content -->
				
				</div>
                </div>
                </div>
                
				
				
        @include('footer')
</body>
</html>