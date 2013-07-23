function validatesup() {
  var un=this.uname.value;
  var p=this.pass.value;
  var rp=this.repass.value;
  var t=this.type.value;
  var c=this.category.value;
  var en=this.ename.value;
  var ec=this.ecode.value;
  var unex=/^[a-z]+$/;
  var ecex=/^[A-Z]+$/;

  if (!un || !p || !rp || (t == "mn" && (!c || !en || !ec))) {
	alert("Please fill in all the fields!");
	return false;
  }
  if (!un.match(unex)) {
	alert("Username should contain only lowercase alphabets.");
	return false;
  }
  if (p != rp) {
	alert("Passwords don't match");
	return false;
  }
  if(t == "mn" && (ec.length!=3 || !ec.match(ecex))) {
	alert("Event code must be 3 alphabets.");
	return false;
  }
}

function validatesin() {
  var u = this.username.value;
  var p = this.password.value;

  if(!u || !p) {
	alert("Please fill in all the fields");
	return false;
  }
}

$(document).ready(function() {
  $("#acctype").change(function() {
  var c=$(this).val();
  if(c=="mn")
	$("#mn_opts").show();
  else
	$("#mn_opts").hide();
  });
  $("#supform").submit(validatesup);
  $("#sinform").submit(validatesin);
  $("#wrapper").show();
});
