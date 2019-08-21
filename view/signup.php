<script>
function send_otp() {
	var signup = document.getElementById('signup');
	var reset = document.getElementById('reset');
	signup.disabled = true;
	signup.onclick="";
	reset.disabled = true;
	var path="<?php echo(SITE_ROOT.'user/send_otp'); ?>";
	var email = document.getElementsByName('email')[1].value;
	var username = document.getElementsByName('username')[0].value;
	var name = document.getElementsByName('name')[0].value;
	var fname = document.getElementsByName('fname')[0].value;
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'error') {
	                signup.disabled = false;
	                reset.disabled = false;
                	return;
                }
                signup.disabled = false;
                reset.disabled = false;
                reset.style.display = "none";
                signup.type="submit";
                document.getElementById('otp').style.display = 'block';
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username="+username+"&name="+name+"&fname="+fname+"&email="+email);
}

function t_send_otp() {
	var signup = document.getElementById('signup_t');
	var reset = document.getElementById('reset_t');
	signup.disabled = true;
	signup.onclick="";
	reset.disabled = true;
	var path="<?php echo(SITE_ROOT.'user/send_otp'); ?>";
	var email = document.getElementsByName('email')[2].value;
	var username = document.getElementsByName('username')[1].value;
	var name = document.getElementsByName('name')[1].value;
	var fname = document.getElementsByName('fname')[1].value;
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	console.log(this.responseText);
                if (this.responseText == 'error') {
	                signup.disabled = false;
	                reset.disabled = false;
                	return;
                }
                signup.disabled = false;
                reset.disabled = false;
                reset.style.display = "none";
                signup.type="submit";
                document.getElementById('otp_t').style.display = 'block';
        }
    };
    xhttp.open("POST", path, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username="+username+"&name="+name+"&fname="+fname+"&email="+email);
}
</script>

<div class="container-fluid" id="switch">
    <div style="width:80%" class="w3-display-middle">
		<h1 class="w3-text-cyan w3-myfont" style="text-align:center;font-size:7vw"><b>Select Mode</b></h1><br/>
		<div class="container" style="width:100%">
			<button style="width:100%" class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-xxlarge" onclick="document.getElementById('student').style.display='block';document.getElementById('switch').style.display='none';" autofocus>Student</button><br/>
			<button style="width:100%" class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-xxlarge w3-section" onclick="document.getElementById('teacher').style.display='block';document.getElementById('switch').style.display='none';">Faculty</button>
		</div>
	</div>
</div>


<div class="container-fluid w3-light-grey" id="student" style="display:none;">
	<form action='<?php echo(generate_link('user', 'register')); ?>' method='post' onsubmit="return validate('all')" class="container w3-margin-top" style="width:60%;">

		<h2 class="w3-text-red w3-myfont"><b>Signup Form</b></h2><br/>

		<div id="er_name" style="display:none"></div>
		<p><label>Full Name</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='name' placeholder='Full Name' onchange="validate('name')" required></p><br/>

		<div id="er_username" style="display:none"></div>
		<p><label>Username</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='username' placeholder='Username' onchange="validate('username')" required></p><br/>

		<div id="er_email" style="display:none"></div>
		<p><label>Email</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='email' name='email' placeholder='Email Id' onchange="validate('email')" required></p><br/>

		<div id="er_contact" style="display:none"></div>
		<p><label>Contact No.</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='number' name='contact' placeholder='Contact No.' onchange="validate('contact')" required></p><br/>

		<div id="er_fname" style="display:none"></div>
		<p><label>Father Name</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='fname' placeholder='Father Name' onchange="validate('fname')" required></p><br/>

		<div id="er_fcontact" style="display:none"></div>
		<p><label>Father's Contact No.</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='number' name='fcontact' placeholder='Father Contact No.' onchange="validate('fcontact')" required></p><br/>

		<div id="er_password" style="display:none"></div>
		<p><label>Password</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='password' name='password' placeholder='Password' onchange="validate('password')" required></p><br/>

		<div id="er_confirm" style="display:none"></div>
		<p><label>Confirm Password</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='password' name='confirm' placeholder='Confirm Password' onchange="validate('confirm')" required></p><br/>

		<p><label for='dob'>Date of Birth</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='date' name='dob' onchange="validate('dob')" required></p><br/>

		<div id="er_qualification" style="display:none"></div>
		<p><label>Qualification</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='qualification' placeholder="Qualification" onchange="validate_t('qualification')" required></p><br/>

		<p><label for='address'>Info</label>
		<textarea class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name='address' placeholder='address' rows = "2" cols = "30" ></textarea></p>

		<p><label for='about_me'>Info</label>
		<textarea class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name='about_me' placeholder='About Me' rows = "6" cols = "30" ></textarea></p>

		<input type="hidden" name="type" value="1">
		<input type="hidden" name="batch_id" value="0">

		<!-- <div class="w3-container" id="otp" style="width:60%;margin:auto;display:none;">
			<h4 style="width:100%;">An OTP has been sent to your email</h4>
			<h2 style="width:100%;">Please Enter OTP</h2>
			<div id="er_otp" style="display:none"></div>
			<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="otp" value="" onchange="validate('otp');" required>
		</div>

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="signup" type='button' name='signup' value='Sign Up' onclick="if (validate('all')) send_otp();"> -->

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="signup" type='submit' name='signup' value='Sign Up'>
		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="reset" type='reset' name='reset' value='Reset'>

	</form>
</div>

<div class="container-fluid w3-light-grey" id="teacher" style="display:none">
	<form action='<?php echo(generate_link('user', 'register')); ?>' method='post' onsubmit="return validate_t('all')" class="container w3-margin-top" style="width:60%;">

		<h2 class="w3-text-red w3-myfont"><b>Signup Form</b></h2><br/>

		<div id="t_er_name" style="display:none"></div>
		<p><label>Full Name</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='name' placeholder='Full Name' onchange="validate_t('name')" required></p><br/>

		<div id="t_er_username" style="display:none"></div>
		<p><label>Userame</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='username' placeholder='Username' onchange="validate_t('username')" required></p><br/>

		<!-- <div id="t_er_institute_id" style="display:none"></div>
		<p><label>Institute ID</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='institute_id' placeholder='Institute Id' onchange="validate_t('institute_id')" required></p><br/> -->

		<div id="t_er_email" style="display:none"></div>
		<p><label>Email</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='email' name='email' placeholder='Email Id' onchange="validate_t('email')" required></p><br/>

		<div id="t_er_contact" style="display:none"></div>
		<p><label>Contact No.</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='number' name='contact' placeholder='Contact No.' onchange="validate_t('contact')" required></p><br/>

		<div id="t_er_fname" style="display:none"></div>
		<p><label>Father's Name</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='fname' placeholder="Father's Name" onchange="validate_t('fname')" required></p><br/>

		<div id="t_er_fcontact" style="display:none"></div>
		<p><label>Father's Contact No.</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='number' name='fcontact' placeholder='Father Contact No.' onchange="validate_t('fcontact')" required></p><br/>

		<div id="t_er_password" style="display:none"></div>
		<p><label>Password</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='password' name='password' placeholder='Password' onchange="validate_t('password')" required></p><br/>

		<div id="t_er_confirm" style="display:none"></div>
		<p><label>Confirm Password</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='password' name='confirm' placeholder='Confirm Password' onchange="validate_t('confirm')" required></p><br/>

		<p><label for='dob'>Date of Birth</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='date' name='dob' onchange="validate_t('dob')" required></p><br/>

		<div id="t_er_qualification" style="display:none"></div>
		<p><label>Qualification</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='qualification' placeholder="Qualification" onchange="validate_t('qualification')" required></p><br/>

		<p><label for='address'>Address</label>
		<textarea class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name='address' placeholder='Address' rows = "2" cols = "30" ></textarea></p>

		<p><label for='about_me'>Info</label>
		<textarea class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name='about_me' placeholder='About Me' rows = "6" cols = "30" ></textarea></p>

		<input type="hidden" name="type" value="2">

		<!--
		<div class="w3-container" id="otp_t" style="width:60%;margin:auto;display:none;">
			<h4 style="width:100%;">An OTP has been sent to your email</h4>
			<h2 style="width:100%;">Please Enter OTP</h2>
			<div id="t_er_otp" style="display:none"></div>
			<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" name="otp" value="" onchange="validate_t('otp');" required>
		</div> 

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="signup_t" type='button' name='signup' value='Sign Up' onclick="if (validate_t('all')) t_send_otp();"> -->

		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="signup_t" type='submit' name='signup' value='Sign Up'>
		<input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round w3-margin-top" id="reset_t" type='reset' name='reset' value='Reset'>
	</form>
</div>