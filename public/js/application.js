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
	

});