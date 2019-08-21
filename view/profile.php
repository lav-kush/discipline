<div>
<div class="w3-third">
      <div class="w3-white w3-text-grey ">
        <div class="w3-display-container">
          <img src="<?php echo(IMAGE_PATH); ?>/<?php echo($data['username']);?>.jpg" style="width:100%" alt="<?php echo($data['username']);?>">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo($data['name']);?></h2>
          </div>
        </div>
        <div class="w3-container">
        	<?php if($data['type'] == 1 ) { ?>
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Student</p>
      <?php }else{
      ?>
      	  <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Teacher</p>
      	<?php }?>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo($data['address']);?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo($data['email']);?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo($data['contact_no']);?></p>
          <hr>

          <!-- <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>          <br>          <br> -->
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>
    <div class="w3-twothird" style="height: auto">
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
      </div>
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
      </div>
    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>
</div>
<div style="clear:left"></div>
<!--

<?php //var_dump($data);print($data['fname']);
?>
<div style="margin:7%;border: 5px solid black;">
<div  style="background-color:#FFF;">
	<div    class="w3-text-black" style="position:relative;">

		<ul style="list-style: none;   border-radius: 25px;background: #dce4f2;padding-bottom:1%;">
			<div class ="container"style="background-color:#8b4de2;display:inline-block;width:100%">
				<h1 align="middle"; style="padding-left:10%;text-align:left;"><?php echo($data['username']); ?></h1>
			</div>
		<a href="<?php echo(generate_link('user', 'profile')); ?>">
  			<img class="w3-circle" src="<?php echo(IMAGE_PATH); ?>/<?php echo($data['username']);?>.jpg" alt="<?php echo(IMAGE_PATH) ?>any.jpg" align="left" style="width:20%;height:80%px;border:1;">
		</a>
		<div class ="container" float="right" style="background-color:white;margin-left:20%;width:80%;">
		<h1>	<li >Username      :  <?php echo($data['username']); ?></li></br>
			<li>Name          :  <?php echo($data['fname']); ?>   <?php echo($data['lname']); ?> </li></br>

			<li style="width:100%">Email         :  <?php echo($data['email']); ?></li></br>
			<li style="width:100%">Date of Birth :  <?php echo($data['dob']); ?></li></br>
			<li style="width:100%">Institute Id  :  <?php echo($data['institute_id']); ?></li></br>
			<li style="width:100%">Branch        :  <?php echo($data['branch']); ?></li></br>
			<?php
        if($data['type']=='1')
        {   ?>
            <li style="width:100%">Semester      :  <?php echo($data['sem']); ?></li></br>
			<li style="width:100%">Cg       :  <?php echo($data['cg']); ?></li></br>
			<?php if($data['batch_id']=='1')
			{	?>		    <li style="width:100%">Batch         :  A1A2</li></br> <?php }
			else{    ?>     <li style="width:100%">Batch         :  A3A4</li></br>   <?php  }
		}
?>
			<li style="width:100%">About me :<?php echo($data['about_me']); ?></li></br>

		</ul>
		</h1></div>
</div>
</div></div>

<br></br></br>
-->