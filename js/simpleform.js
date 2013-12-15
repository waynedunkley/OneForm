$(document).ready(function(){

	var formCode = 'g4Kl!x*'; //This MUST match value of hidden code field in contactform

	$('#submit-btn').click(function (e) {
		e.preventDefault();
		var result = validateForm($('#contactform'));
		if(result == true){
			var formData = {
				'name': $('#contactform input[name="name"]').val(),
				'email': $('#contactform input[name="email"]').val(),
				'phone': $('#contactform input[name="phone"]').val(),
				'website': $('#contactform input[name="website"]').val(),
				'message': $('#contactform textarea[name="message"]').val(),
				'confirmation': $('#contactform input[name="confirmation"]').is(':checked')
			};
			var dataString = $.param(formData);
			$.ajax({
				url: './php/mailform.php',
				type: 'POST',
				data: dataString,
				success: function (res) {
					if (res) {
						$('#contactform').addClass('sent');
						$('.sentoverlay').fadeIn(600);
					} else {
						alert('Opps! Somethings gone wrong. Please refresh and try again');
					}
				}
			});
			
		}
		
	});
	
	function validateForm(form){
		$('input,textarea').removeClass('error');
		var validform = true;

		$('input,textarea').each(function (index) {
			var type = $(this).attr('name');
			var input = $(this).val();
						
			switch(type){
				case "name":
					if(input.length == 0){
						$(this).addClass('error');
						validform = false;
					};
					break;
				case "email":
					var atpos = input.indexOf("@");
					var dotpos = input.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2 >= input.length){
						$(this).addClass('error');
						validform = false;
					}
					break;
				case "phone":
					//perform validation
					break;
				case "website":
					//perform validation
					break;
				case "message":
					if(input.length == 0){
						$(this).addClass('error');
						validform = false;
					};
					break;
				case "blank":
					if(input != ""){
						validform = false;
					}
					break;
				case "code":
					if(input != formCode){
						$('#contact-area').append('<p>There was an error, form cannot be processed!</p>');
						validform = false;
					}
					break;
			}
		});
		
		if(validform == true){
			return true;
		}else{
			return false;
		}
	}
	
});