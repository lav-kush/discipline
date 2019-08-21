function isAlphaNumeric(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 47 && code < 58) && // numeric (0-9)
        !(code > 64 && code < 91) && // upper alpha (A-Z)
        !(code > 96 && code < 123)) { // lower alpha (a-z)
      return false;
    }
  }
  return true;
};
function isAlpha(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 64 && code < 91) && // upper alpha (A-Z)
        !(code > 96 && code < 123) &&  // lower alpha (a-z)
        code != 32) {
      return false;
    }
  }
  return true;
};
function isNumeric(str) {
  var code, i, len;

  for (i = 0, len = str.length; i < len; i++) {
    code = str.charCodeAt(i);
    if (!(code > 47 && code < 58)) {
      return false;
    }
  }
  return true;
};

function validate(str) {
    var name=document.getElementsByName('name')[0];
    var fname=document.getElementsByName('fname')[0];
    var username=document.getElementsByName('username')[0];
    var contact=document.getElementsByName('contact')[0];
    var email=document.getElementsByName('email')[1];
    var password=document.getElementsByName('password')[1];
    var confirm=document.getElementsByName('confirm')[0];
    var fcontact=document.getElementsByName('fcontact')[0];
    var dob=document.getElementsByName('dob')[0];
    var qualification=document.getElementsByName('qualification')[0];
    var er_name = document.getElementById('er_name');
    var er_fname = document.getElementById('er_fname');
    var er_username = document.getElementById('er_username');
    var er_email = document.getElementById('er_email');
    var er_password = document.getElementById('er_password');
    var er_confirm = document.getElementById('er_confirm');
    var er_contact = document.getElementById('er_contact');
    var er_fcontact = document.getElementById('er_fcontact');
    var er_qualification = document.getElementById('er_qualification');

    var error = true;

    if (str == 'email' || str == 'all') {
        var atposition=email.value.indexOf("@");  
        var dotposition=email.value.lastIndexOf(".");  
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.value.length){ 
            er_email.style.display = 'initial';
            er_email.innerHTML = 'Enter Valid Mail Id<br/>';
            email.style.borderColor = 'red';
            error = false;
        }else {
            er_email.style.display = 'none';
            email.style.borderColor = 'inherit';
        }
    }

    if (str == 'name' || str == 'all') {
        if (!isAlpha(name.value)) {
            er_name.style.display = 'initial';
            er_name.innerHTML = 'Enter Only Alphabets<br/>';
            name.style.borderColor = 'red';
            error = false;
        }
        else if (name.value.length > 20) {
            er_name.style.display = 'initial';
            er_name.innerHTML = 'Length Limit Exceeded<br/>';
            name.style.borderColor = 'red';
            error = false;
        }
        else {
            er_name.style.display = 'none';
            name.style.borderColor = 'inherit';
        }
        if (str == 'name') return error;
    }

    if (str == 'fname' || str == 'all') {
        if (!isAlpha(fname.value)) {
            er_fname.style.display = 'initial';
            er_fname.innerHTML = 'Enter Only Alphabets<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else if (fname.value.length > 20) {
            er_fname.style.display = 'initial';
            er_fname.innerHTML = 'Length Limit Exceeded<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else {
            er_fname.style.display = 'none';
            fname.style.borderColor = 'inherit';
        }
        if (str == 'fname') return error;
    }

    if (str == 'username' || str == 'all') {
        if (!isAlphaNumeric(username.value)) {
            er_username.style.display = 'initial';
            er_username.innerHTML = 'Enter Only Alphabets and Numbers<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else if (username.value.length > 20) {
            er_username.style.display = 'initial';
            er_username.innerHTML = 'Length Limit Exceeded<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else {
            er_username.style.display = 'none';
            username.style.borderColor = 'inherit';
        }
        if (str == 'username') return error;
    }

    if (str == 'password' || str == 'all') {
        if (password.value.length < 3) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Very Weak Password<br/>';
            password.style.borderColor = 'red';
            error = false;
        }
        else if (password.value.length < 5) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Weak Password<br/>';
            password.style.borderColor = 'orange';
            error = false;
        }
        else if (password.value.length < 8) {
            er_password.style.display = 'initial';
            er_password.innerHTML = 'Moderate Password<br/>';
            password.style.borderColor = 'yellow';
            error = false;
        }
        else {
            er_password.style.display = 'none';
            password.style.borderColor = 'inherit';
        }

        if (confirm.value !== password.value) {
            er_confirm.style.display = 'initial';
            er_confirm.innerHTML = 'Passwords do not match<br/>';
            confirm.style.borderColor = 'red';
            error = false;
        }
        else {
            er_confirm.style.display = 'none';
            confirm.style.borderColor = 'inherit';
        }

        if (str == 'password') return error;
    }

    if (str == 'confirm' || str == 'all') {
        if (confirm.value !== password.value) {
            er_confirm.style.display = 'initial';
            er_confirm.innerHTML = 'Passwords do not match<br/>';
            confirm.style.borderColor = 'red';
            error = false;
        }
        else {
            er_confirm.style.display = 'none';
            confirm.style.borderColor = 'inherit';
        }
        if (str == 'confirm') return error;
    }

    if (str == 'contact' || str == 'all') {
        if (contact.value == 0 || contact.value.length != 10) {
            er_contact.style.display = 'initial';
            er_contact.innerHTML = 'Enter Valid Contact No.<br/>';
            contact.style.borderColor = 'red';
            error = false;
        }
        else {
            er_contact.style.display = 'none';
            contact.style.borderColor = 'inherit';
        }
        if (str == 'contact') return error;
    }

    if (str == 'fcontact' || str == 'all') {
        if (fcontact.value == 0 || fcontact.value.length != 10) {
            er_fcontact.style.display = 'initial';
            er_fcontact.innerHTML = "Enter Valid Father's Contact No.<br/>";
            fcontact.style.borderColor = 'red';
            error = false;
        }
        else {
            er_fcontact.style.display = 'none';
            fcontact.style.borderColor = 'inherit';
        }
        if (str == 'fcontact') return error;
    }
    if (str == 'qualification' || str == 'all') {
        if (qualification.value.length ==0 || qualification.value.length > 100) {
            t_er_qualification.style.display = 'initial';
            t_er_qualification.innerHTML = 'enter Valid Qualification<br/>';
            qualification.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_qualification.style.display = 'none';
            qualification.style.borderColor = 'inherit';
        }
        if (str == 'qualification') return error;
    }
    if (str == 'all') return error;
}

function validate_t(str) {
    var name=document.getElementsByName('name')[1];
    var fname=document.getElementsByName('fname')[1];
    var username=document.getElementsByName('username')[1];
    var email=document.getElementsByName('email')[2];
    var contact=document.getElementsByName('contact')[1];
    var fcontact=document.getElementsByName('fcontact')[1];
    var password=document.getElementsByName('password')[2];
    var confirm=document.getElementsByName('confirm')[1];
    var dob=document.getElementsByName('dob')[1];
    var qualification=document.getElementsByName('qualification')[0];
    var t_er_name = document.getElementById('t_er_name');
    var t_er_fname = document.getElementById('t_er_fname');
    var t_er_username = document.getElementById('t_er_username');
    var t_er_email = document.getElementById('t_er_email');
    var t_er_password = document.getElementById('t_er_password');
    var t_er_confirm = document.getElementById('t_er_confirm');
    var t_er_fcontact = document.getElementById('t_er_fcontact');
    var t_er_qualification = document.getElementById('t_er_qualification');

    var error = true;

    if (str == 'email' || str == 'all') {
        var atposition=email.value.indexOf("@");  
        var dotposition=email.value.lastIndexOf(".");  
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.value.length){ 
            t_er_email.style.display = 'initial';
            t_er_email.innerHTML = 'Enter Valid Mail Id<br/>';
            email.style.borderColor = 'red';
            error = false;
        }else {
            t_er_email.style.display = 'none';
            email.style.borderColor = 'inherit';
        }
    }

    if (str == 'name' || str == 'all') {
        if (!isAlpha(name.value)) {
            t_er_name.style.display = 'initial';
            t_er_name.innerHTML = 'Enter Only Alphabets<br/>';
            name.style.borderColor = 'red';
            error = false;
        }
        else if (name.value.length > 20) {
            t_er_name.style.display = 'initial';
            t_er_name.innerHTML = 'Length Limit Exceeded<br/>';
            name.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_name.style.display = 'none';
            name.style.borderColor = 'inherit';
        }
        if (str == 'name') return error;
    }

    if (str == 'fname' || str == 'all') {
        if (!isAlpha(fname.value)) {
            t_er_fname.style.display = 'initial';
            t_er_fname.innerHTML = 'Enter Only Alphabets<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else if (fname.value.length > 20) {
            t_er_fname.style.display = 'initial';
            t_er_fname.innerHTML = 'Length Limit Exceeded<br/>';
            fname.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_fname.style.display = 'none';
            fname.style.borderColor = 'inherit';
        }
        if (str == 'fname') return error;
    }

    if (str == 'username' || str == 'all') {
        if (!isAlphaNumeric(username.value)) {
            t_er_username.style.display = 'initial';
            t_er_username.innerHTML = 'Enter Only Alphabets and Numbers<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else if (username.value.length > 20) {
            t_er_username.style.display = 'initial';
            t_er_username.innerHTML = 'Length Limit Exceeded<br/>';
            username.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_username.style.display = 'none';
            username.style.borderColor = 'inherit';
        }
        if (str == 'username') return error;
    }

    if (str == 'password' || str == 'all') {
        if (password.value.length < 3) {
            t_er_password.style.display = 'initial';
            t_er_password.innerHTML = 'Very Weak Password<br/>';
            password.style.borderColor = 'red';
            error = false;
        }
        else if (password.value.length < 5) {
            t_er_password.style.display = 'initial';
            t_er_password.innerHTML = 'Weak Password<br/>';
            password.style.borderColor = 'orange';
            error = false;
        }
        else if (password.value.length < 8) {
            t_er_password.style.display = 'initial';
            t_er_password.innerHTML = 'Moderate Password<br/>';
            password.style.borderColor = 'yellow';
            error = false;
        }
        else {
            t_er_password.style.display = 'none';
            password.style.borderColor = 'inherit';
        }

        if (confirm.value !== password.value) {
            t_er_confirm.style.display = 'initial';
            t_er_confirm.innerHTML = 'Passwords do not match<br/>';
            confirm.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_confirm.style.display = 'none';
            confirm.style.borderColor = 'inherit';
        }

        if (str == 'password') return error;
    }

    if (str == 'confirm' || str == 'all') {
        if (confirm.value !== password.value) {
            t_er_confirm.style.display = 'initial';
            t_er_confirm.innerHTML = 'Passwords do not match<br/>';
            confirm.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_confirm.style.display = 'none';
            confirm.style.borderColor = 'inherit';
        }
        if (str == 'confirm') return error;
    }
    if (str == 'contact' || str == 'all') {
        if (contact.value == 0 || contact.value.length != 10) {
            t_er_contact.style.display = 'initial';
            t_er_contact.innerHTML = 'Enter Valid Contact No.<br/>';
            contact.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_contact.style.display = 'none';
            contact.style.borderColor = 'inherit';
        }
        if (str == 'contact') return error;
    }

    if (str == 'fcontact' || str == 'all') {
         if (fcontact.value == 0 || fcontact.value.length != 10) {
            t_er_fcontact.style.display = 'initial';
            t_er_fcontact.innerHTML = 'Enter Valid Father Contact No.<br/>';
            fcontact.style.borderColor = 'red';
            error = false;
        }
        else {
            t_er_fcontact.style.display = 'none';
            fcontact.style.borderColor = 'inherit';
        }
        if (str == 'fcontact') return error;
    }

    if (str == 'all') return error;
}