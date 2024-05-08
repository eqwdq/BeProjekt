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
								<li class="active">PROGRAM</li>
							</ul>
							<h2>PROGRAM</h2>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.header-area -->
		
		<div class="schedule-area page-section gray-bg">
			<div class="container">
				<div class="schedules">
					<div class="row no-margin">
						<div class="col-md-3 no-padding">
							<div class="schedule-title">
								<h5>Date</h5>
							</div>
							<div class="schedule-date">
								<ul class="nav nav-tabs" role="tablist">
									<li class="active">
										<a href="#date-1" data-toggle="tab">
											<h4>Day 1</h4>
											<h5>24 DECEMBER</h5>
										</a>
									</li>
									<li>
										<a href="#date-2" data-toggle="tab">
											<h4>Day 2</h4>
											<h5>25 DECEMBER</h5>
										</a>
									</li>
									<li>
										<a href="#date-3" data-toggle="tab">
											<h4>Day 3</h4>
											<h5>26 DECEMBER</h5>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-9 no-padding">
							<div class="schedule-details">
								<div class="schedule-title">
									<div class="row no-margin">
										<div class="col-sm-3 no-padding">
											<h5>Time</h5>
										</div>
										<div class="col-sm-9 no-padding">
											<h5>SESSION TITLE</h5>
										</div>
									</div>
								</div>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="date-1">
										<div class="panel-group" id="accordion" role="tablist">
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#schedule-1-1">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>09:00 Am - 02:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Introduceing Material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-1-1" class="panel-collapse collapse in" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="" data-toggle="collapse" data-parent="#accordion" href="#schedule-1-2">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>02:00 Pm - 05:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Where to start with material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-1-2" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="" data-toggle="collapse" data-parent="#accordion" href="#schedule-1-3">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>05:00 Pm - 08:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Material Design for web site</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-1-3" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
										</div><!-- /.panel-group -->
									</div><!-- /.tab-pane -->
									<div role="tabpanel" class="tab-pane" id="date-2">
										<div class="panel-group" id="accordion-2" role="tablist">
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="collapsed" data-toggle="collapse" data-parent="#accordion-2" href="#schedule-2-1">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>09:00 Am - 02:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Introduceing Material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-2-1" class="panel-collapse collapse in" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="" data-toggle="collapse" data-parent="#accordion-2" href="#schedule-2-2">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>02:00 Pm - 05:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Where to start with material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-2-2" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
										</div><!-- /.panel-group -->
									</div><!-- /.tab-pane -->
									<div role="tabpanel" class="tab-pane" id="date-3">
										<div class="panel-group" id="accordion-3" role="tablist">
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#schedule-3-1">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>09:00 Am - 02:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Introduceing Material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-3-1" class="panel-collapse collapse in" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="" data-toggle="collapse" data-parent="#accordion-3" href="#schedule-3-2">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>05:00 Pm - 08:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Material Design for web site</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-3-2" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
											<div class="single-schedule panel panel-default">
												<div class="panel-heading" role="tab">
												  <div class="panel-title single-schedule-title">
													<a class="" data-toggle="collapse" data-parent="#accordion-3" href="#schedule-3-3">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<h5>02:00 Pm - 05:00PM</h5>
															</div>
															<div class="col-sm-9 no-padding">
																<h5>Where to start with material Design</h5>
															</div>
														</div>
													</a>
												  </div>
												</div>
												<div id="schedule-3-3" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body">
														<div class="row no-margin">
															<div class="col-sm-3 no-padding">
																<div class="schedule-img">
																	<img src="images/schedule/1.jpg" alt="schedule" />
																</div>
															</div>
															<div class="col-sm-9 no-padding">
																<div class="schedule-info">
																	<p>Material Design is a new Design language Invented by google & its going to rules design industry for few next years. So I think Every Designer Should have some or at least a little bot of knowledge about material design.</p>
																	<h5><span>With</span> : Zarina Kame <small>Designer at <a href="">Google</a></small></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.single-schedule -->
										</div><!-- /.panel-group -->
									</div><!-- /.tab-pane -->
								</div><!-- /.tab-content -->
							</div><!-- /.schedule-details -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.schedules -->
			</div>
		</div><!-- /.schedule-area -->
        @include('footer')
</body>
</html>