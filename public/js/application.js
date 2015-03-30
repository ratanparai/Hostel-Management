$(document).ready(function(){
	
	/**
	 * login function
	 */
	$('#login').click(function(){

		
		if($('.username').hasClass("has-error has-feedback")){
			$('.username').removeClass("has-error has-feedback");
		}
		
		if($('.password').hasClass("has-error has-feedback")){
			$('.password').removeClass("has-error has-feedback");
		}
		
		var username = $('#username').val();
		var password = $('#password').val();
		
		var dataString = 'username=' + username + '&password=' + password;
		
		$.ajax({
			type:"POST",
			url : "http://localhost/hostel/login/login",
			data : dataString,
			cache : false,
			success : function(result) {
				console.log(result);

				var obj = jQuery.parseJSON(result);
				
				if(obj.errors) {
					$(".message").html(obj.errors[0].message);
					var errorCode = obj.errors[0].code;
					if(errorCode === 10 || errorCode === 12) {
						// error in username field make the field red
						$(".username").addClass("has-error has-feedback");
					} else {
						// error is password field. make the field red
						$(".password").addClass("has-error has-feedback");
					}
				} else {
					
					$(".message").html(obj.success[0].message );
					window.location = "http://localhost/hostel/home";
				}
				
			}
		});
	});
	
	/**
	 * When a user hit enter after entering pass then the 
	 * login button click event will kick-in.
	 */
	$('#password').keyup(function(event) {
		if(event.keyCode == 13) {
			$('#login').click();
		}
	});
	
	/**
	 * User registration event handler
	 */
	$('#register').click(function(){
		var username = $('#username').val();
		var email = $('#email').val();
		var access_level = $('#access_level').val();
		
		
		//alert(username+" "+email+" "+access_level);
		//var dataString = "username=" + username + "&email=" + email + "&access_level=" + access_level;
		//alert(dataString);
		$.post("http://localhost/hostel/login/register_action", 
				{
					username : username, 
					email: email, 
					access_level: access_level
				}, function(data){
					 if(data.errors) {
						 $('.add-user-message').removeClass("alert alert-success");
						 $('.add-user-message').addClass("alert alert-danger");
						 $('.add-user-message').html(data.errors[0].message);
						 $('.add-user-message').css("visibility","visible");
					 } else {
						 $('.add-user-message').removeClass("alert alert-danger");
						 $('.add-user-message').addClass("alert alert-success");
						 $('.add-user-message').html(data.success[0].message);
						 $('.add-user-message').css("visibility","visible");
					 }
					 
					
				}, "json"
		);
		
	});
	
	$('#updateprofile').click(function(){
		var full_name = $('#full_name').val();
		var email = $('#email').val();
		
		console.log(5 + 6);
		
		$.post("http://localhost/hostel/profile/updateAccountAction",
				{
					full_name : full_name,
					email : email
				}, function(data) {
					console.log('printing data');
					console.log(data);
					
					if(data.errors){
						$('.add-user-message').removeClass("alert alert-success");
						$('.add-user-message').addClass("alert alert-danger");
						$('.add-user-message').html(data.errors[0].message);
						$('.add-user-message').css("visibility","visible");
					} else {
						$('.add-user-message').removeClass("alert alert-danger");
						$('.add-user-message').addClass("alert alert-success");
						$('.add-user-message').html(data.success[0].message);
						$('.add-user-message').css("visibility","visible");
					}
					
				}, "json"
		);
		
		console.log('function out');
		
	});

});