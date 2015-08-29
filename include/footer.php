	<footer class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="foot-top">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-6">
							<a href="javascript:void(0);" title="Timeshare Exits" class="foot-logo"><img src="<?= DEFAULT_URL;?>/assets/img/grey-logo.png" alt="Logo"/></a>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6">
							<div class="foot-rt">
								<ul class="link">
									<li><a href="javascript:void(0);" title="Contact" class="trans">Contact</a></li>
									<li><a href="javascript:void(0);" title="About" class="trans">About</a></li>
									<li><a href="javascript:void(0);" title="Privacy Policy" class="trans">Privacy Policy</a></li>
								</ul>
								<ul class="social">
									<li><a href="javascript:void(0);" title="Facebook" data-toggle="tooltip"  data-placement="top" class="fb trans rad50"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:void(0);" title="LinkedIn" data-toggle="tooltip"  data-placement="top" class="li trans rad50"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="javascript:void(0);" title="Twitter" data-toggle="tooltip"  data-placement="top" class="tw trans rad50"><i class="fa fa-twitter"></i></a></li>
									<li><a href="javascript:void(0);" title="Mail Us" data-toggle="tooltip"  data-placement="top" class="mail trans rad50"><i class="fa fa-envelope"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="col-xs-12">All rights reserved &copy; 2015  </p>
		</div>
	</footer>
	<!-- footer ends -->
</section>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	$('.range-slider').jRange({
		from: 0,
		to: 1000,
		step:1,
		//scale: [0,100,200,300,400,500,600,700,800,900,1000],
		format: '%s',
		width: 380,
		showLabels: true,
	});
});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>
</html>
