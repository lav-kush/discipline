<div class="w3-panel w3-card-2 w3-light-grey"  id="admin-panel">

	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">

		<h2 class="w3-text-blue w3-myfont"><b>Admin Panel</b></h2><br/>
		<div id="latest_notice"></div>
		<h2><label style="float: left">Latest Notice</label><br/>
		<h4 style="background: #0ff; width: auto; ">Current Notice: <?php $i = 0; $x = "num_".$i; echo(${$x}['info']); ?></h4>
		<form action="<?php echo(generate_link('user', 'notice')); ?>" method="post">
			<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='latest_notice_info' placeholder='Latest Notice'  required></h2>
			<input type="hidden" name="user" value="<?php echo($username); ?>">
			<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" style="float: left;" type='submit' name='latest_notice_button'>
		</form>
	</div>	<br />

	<div class="container-fluid w3-light-grey" id="bannerListDiv">
		<h2 class="w3-text-blue w3-myfont"><b>Banner List</b></h2>
		<table >
		  <tr style="border: 1px solid black;background: white;">
		    <th> Image Name</th>
		    <th>Message</th>
		    <th>Link</th>
		    <th></th>
		  </tr>
		<?php
		$i = 1;
		$bannerListFromDB = array();
		while($i <= $bannerLen) {  
			$x = "num_".$i;
			array_push($bannerListFromDB, ${$x}['image']);
			?>
			<form action="<?php echo(generate_link('user', 'delete_banner')); ?>" method="post">
			 <tr>
			    <td style="border: 1px solid #ddd;" ><?php echo(${$x}['image']); ?>
			    	<input type="hidden" name="image" value="<?php echo(${$x}['image']); ?>">
			    </td>
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['message']); ?></td>
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['link']); ?></td>
			    <td style="border: 1px solid #ddd;">
			    	<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" id="deleteBannerButton" type='submit' name='deleteBanner' value='Delete banner'>
			    </td>
		  	</tr>
		  </form>

			<?php
			$i++;
		} ?>
		<form action="<?php echo(generate_link('user', 'add_banner')); ?>" method="post">
			<tr>
				<td>
					<div id="bannerImage"><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text'  name='image' placeholder='image' required onchange="isBannerExistFunction(this.value);"></div></td>
				<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='message' placeholder='message' required></td>
				<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='link' placeholder='link'  required></td>
				<td>
				    	<input class="w3-button w3-blue w3-hover-cyan w3-ripple w3-round"  style="display:none;" id="bannerAddButton" type='submit' name='addBanner' value='Add banner'>
				    </td>
			</tr>
		</form>
		</table>
		<h4 class="w3-red w3-ripple"  style="display:none;" id="bannerAddButtonError1" name='bannerAddButtonError1' value="Banner already Exists">Banner already Exists</h4>
		<h4 class="w3-red w3-ripple"  style="display:none;" id="bannerAddButtonError2" name='bannerAddButtonError2'>Image Not present in banner Folder, Please Upload banner</h4>
	</div>

	<br /><br />
	<div class="container-fluid w3-light-grey" id="notificationListDiv">
		<h2 class="w3-text-blue w3-myfont"><b>Notification List</b></h2>
		<table>
		  <tr style="border: 1px solid black;background: white;">
		    <th>info</th>
		    <th>Start Time</th>
		    <th>End Time</th>
		    <th>link</th>
		    <th></th>
		  </tr>
		<?php
		$i = $bannerLen + 1;
		while($i < $notificationLen + $bannerLen + 1) {
			$x = "num_".$i;
			?>
			<form action="<?php echo(generate_link('user', 'delete_notification')); ?>" method="post">
			<input type="hidden" name="n_id" value="<?php echo(${$x}['n_id']); ?>">
			 <tr >
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['info']); ?></td>
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['start_time']); ?></td>
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['end_time']); ?></td>
			    <td style="border: 1px solid #ddd;"><?php echo(${$x}['link']); ?></td>
			    <td style="border: 1px solid #ddd;">
			    	<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" id="latest_notice_button" type='submit' name='deleteNotification' value='Delete notification'>
			    </td>
		  	</tr>
		  </form>

			<?php
			$i++;
		} ?>
		<form action="<?php echo(generate_link('user', 'add_notification')); ?>" method="post">
		<tr>
			<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='info' placeholder='info'  required></td>
			<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='date' name='start_time' required></td>
			<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='date' name='end_time'  ></td>
			<td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='link' placeholder='link'  required></td>
			<td>
			    	<input class="w3-button w3-blue w3-hover-cyan w3-ripple w3-round" id="latest_notice_add_button" type='submit' name='addNotification' value='Add notification'>
			    </td>
		</tr>
	</form>
		</table>
	</div>

</div>
<?php
		$bannerList = array();
		foreach (glob(BANNER_IMG_PATH.'*.jpg') as $filename){
			array_push($bannerList, $filename);
			$banner = $filename;
		}
		// echo implode(" ", $bannerList);
		// echo "\n\n";
		if(in_array($banner, $bannerList, ))
		{	// echo "found";
			$isBannerExists = 1; }
		else{
			// echo "Not Found";
			$isBannerExists = 0;
		}
	?>
<script type="text/javascript">
function isBannerExistFunction($value) {
	var $bannerList  = <?php echo json_encode($bannerList);	?>;
	var $bannerListFromDB = <?php echo json_encode($bannerListFromDB);	?>;
	if ($bannerListFromDB.includes($value)){
		document.getElementById('bannerAddButtonError1').style.display = 'block';
		document.getElementById('bannerAddButtonError2').style.display = 'none';
		return;
	}
	var bannerPath="<?php echo(BANNER_IMG_PATH); ?>"+$value;
	if ($bannerList.includes(bannerPath))
		document.getElementById('bannerAddButton').style.display = 'block';
	else{
		document.getElementById('bannerAddButtonError1').style.display = 'none';
		document.getElementById('bannerAddButtonError2').style.display = 'block';
	}
	document.getElementById('bannerAddButtonError1').style.display = 'none';
	document.getElementById('bannerAddButtonError2').style.display = 'none';

}
</script>
