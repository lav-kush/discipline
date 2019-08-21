<div class="w3-content w3-display-container" style="max-width:100%;max-height:64%;cursor:pointer">
	<?php
		$i = 0;
		while($i < $len) {
			$x = "num_".$i;
			?>
			<div class="banner-slide w3-animate-right" onclick="location.href='<?php echo(generate_link('contest', '?c_id='.${$x}['c_id'])); ?>'">
				<img src="<?php echo(BANNER_PATH.${$x}['image']); ?>" style="width:100%;height:100%">
				<div class="w3-padding-16 w3-container w3-black w3-display-bottomleft" style=" color:black; ;max-width:28s%;">
					Are You Ready To Give Flight To Your Dreams!</br>
				   	Dream is not that which you see while sleeping;
			        It is something that doesnot let you sleep...
					<!-- <?php echo(${$x}['contest_name']); ?> -->
				</div>
				   
			</div>
			<?php
			$i++;
		} ?>
	<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-middle" style="width:100%">
		<div class="w3-left w3-hover-text-khaki w3-xxxlarge" onclick="plusDivs(-1)">&#10094;</div>
		<div class="w3-right w3-hover-text-khaki w3-xxxlarge" onclick="plusDivs(1)">&#10095;</div>
	</div>
	<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
		<?php
			$i = 0;
			while($i < $len) { ?>
				<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo($i + 1); ?>)" style="height:13px;width:13px;padding:0px"></span>
			<?php
				$i++;
				}
			?>
	</div>
</div>
<div class="w3-center w3-container" style="margin-left: auto; margin-right: auto;">
	<h2 style="margin-left: auto; 	background-color:black; float:left;	color:white; padding: 0.82% 1%;" >LATEST NOTICE </h2>
    <marquee style="border: black 2px solid; float: left; width: 84%; margin: 0.7% 0"> 
    	<?php	$i = $len;
				$x = "num_".$i;	
		?>
       <h2> <?php echo ${$x}['info']; ?>
	   </h2> 
	 </marquee>
</div>
<script>
	var slideIndex = 1;
	showDivs(slideIndex);
	setTimeout(nextSlide, 5000);

	function nextSlide() {
		plusDivs(1);
		setTimeout(nextSlide, 5000);
	}

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function currentDiv(n) {
	  showDivs(slideIndex = n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("banner-slide");
	  var dots = document.getElementsByClassName("demo");
	  if (n > x.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
		 x[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
		 dots[i].className = dots[i].className.replace(" w3-white", "");
	  }
	  x[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " w3-white";
	}
</script>

<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<script>
	AOS.init();
</script>
<div class="container-fluid clearfix" style="padding:0px;background-color:#191d20;">
	<div style="margin:60px auto;width:100%;text-align:center;">
		<h1 class="w3-text-cyan" style="font-size:5vw;font-family:monoton,cursive;">About Us</h1>
	</div>
	<div onclick="location.href='#" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<!-- <img src="<?php echo(IMAGE_PATH); ?>banner11.jpg" style="width:100%;height:100%;"> -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.4647615256645!2d78.38328501537089!3d17.437455605947633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91588d57ddcd%3A0x75bd8a8c0c6516f5!2sArcesium+India+Private+Ltd!5e0!3m2!1sen!2sin!4v1565614414873!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<!--   <?php echo(generate_link('problem', 'all')); ?>   -->
	<div onclick="location.href='#'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<div class="card w3-display-middle">
			<h1 class="w3-text-white" style="text-align: center;font-size:4vw;">Discipline</h1>
			<h3 class="w3-text-white"> is a group of young, motivated and enthusiastic professionals who from various field of education has confluenced togather to build a quality environment of education in the "Land of Knowledge" who was once called as "JagatGuru"</h3>
		</div>
		
	</div>
	<!--   <?php echo(generate_link('contest', 'all')); ?>   -->
	<div onclick="location.href='#'" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<div class="card w3-display-middle">
			<h1 class="w3-text-white" style="text-align: center;font-size:3vw;">Vision</h1>
			<h3 class="w3-text-white"> To Satiate the crave of knowledge among deprived people and led their path towards succesfull future and succeddfully developelemt of nation</h3>	
		</div>
	</div>
	<div onclick="location.href='#'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<img src="<?php echo(IMAGE_PATH); ?>banner22.jpg" style="width:100%;height:100%;">
	</div>

	<div onclick="location.href='#'" data-aos-offset="250" data-aos="fade-right" data-aos-duration="800" class="container" style="height:50%;float:left;width:50%;padding:0px;cursor:pointer;">
		<img src="<?php echo(IMAGE_PATH); ?>banner33.jpg" style="width:100%;height:100%;">
	</div>
	<div onclick="location.href='#'" data-aos-offset="250" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300" class="container" style="height:50%;float:right;width:50%;padding:0px;cursor:pointer;">
		<div class="card w3-display-middle">
			<h1 class="w3-text-white" style="text-align: center;font-size:3vw;">Mission </h1>
			<h3 class="w3-text-white"> To spread knowledge and illuminate young mind.</h3>
		</div>		
	</div>
</div>

<!--
<div class="clearfix" style="background-color:#191d20;padding-top:64px;">
	<div data-aos-offset="150" data-aos="fade-right" style="float:left;" class="left-part w3-text-white">
		<h1 style="text-align:center;">Top Programmers</h1>
		<ul class="w3-ul w3-center w3-border">
			<li style="width:100%">Vinayak</li>
			<li style="width:100%">Shivanjal</li>
			<li style="width:100%">Lavkush</li>
		</ul>
	</div>
	<div data-aos-offset="150" data-aos="fade-left" style="float:right;" class="right-part w3-text-white">
		<h1 style="margin-bottom:0px;padding-bottom:1vw;text-align:center;overflow-y:auto;">Top Contributors</h1>
		<ul class="w3-ul w3-center w3-border">
			<li style="width:100%">Vinayak</li>
			<li style="width:100%">Shivanjal</li>
			<li style="width:100%">Lavkush</li>
		</ul>
	</div>
	<div class="circular-image"></div>
</div>-->