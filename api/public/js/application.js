$(document).ready(function(){
	/**
	 * login function
	 */
	$('#login').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		
		var dataString = 'username=' + username + '&password=' + password;
		
		$.ajax({
			type:"POST",
			url : "login",
			data : dataString,
			cache : false,
			success : function(result) {
				var obj = jQuery.parseJSON(result);
				if(obj.errors) {
					$(".message").html(obj.errors[0].message);
				}
				if(obj.success) {
					$(".message").html(obj.success[0].message);
				}
			}
		});
	});
});