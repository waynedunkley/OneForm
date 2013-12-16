$(document).ready(function(){

	var cf = new Object();

	/*######################################################################################
	# UPDATE THESE FIELDS
	########################*/

	cf._id = 'contactform'; //Id of form you want to process, do not include id tag. ie. (#)
	cf.code = 'g4Kl!x*'; //This MUST match value of hidden code field in contactform
	cf.submit_id = 'submit-btn'; //Id of form submit button, do not include id tag. ie. (#)

	//Elements of form to validate, select true for areas of form to validate
	cf.req = new Object();
	cf.req.name = true;
	cf.req.email = true;
	cf.req.company = false;
	cf.req.phone = false;
	cf.req.website = false;
	cf.req.message = true;

	/*######################################################################################*/
	/*######################################################################################*/

	


	$('#' + cf.submit_id).click(function (e) {
		e.preventDefault();
		var result = validateForm(cf._id);
		if(result == true){
			var formData = {
				'name': $('#' + cf._id + ' input[name="name"]').val(),
				'email': $('#' + cf._id + ' input[name="email"]').val(),
				'company': $('#' + cf._id + ' input[name="company"]').val(),
				'phone': $('#' + cf._id + ' input[name="phone"]').val(),
				'website': $('#' + cf._id + ' input[name="website"]').val(),
				'message': $('#' + cf._id + ' textarea[name="message"]').val(),
				'confirmation': $('#' + cf._id + ' input[name="confirmation"]').is(':checked')
			};
			var dataString = $.param(formData);
			$.ajax({
				url: './php/mailform-2.php',
				type: 'POST',
				data: dataString,
				success: function (res) {
					if (res) {
						$('#' + cf._id ).addClass('sent');
						$('.sentoverlay').fadeIn(600);
					} else {
						alert('Opps! Somethings gone wrong. Please refresh and try again');
					}
				}
			});
			
		}
		
	});
	
	function validateForm(id){
		$('#' + id + ' input,textarea').removeClass('error');
		var validform = true;

		$('#' + id + ' input,textarea').each(function (index) {
			var type = $(this).attr('name');
			var input = $(this).val();
				
			if(cf.req[type]){		
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
						if(input.length < 10){
							$(this).addClass('error');
							validform = false;
						};
						break;
						break;
					case "website":
						//perform validation
						break;
					case "company":
						if(input.length == 0){
							$(this).addClass('error');
							validform = false;
						};
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
						if(input != cf.code){
							$('#contact-area').append('<p>There was an error, form cannot be processed!</p>');
							validform = false;
						}
						break;
				}
			}
		});
		
		if(validform == true){
			return true;
		}else{
			return false;
		}
	}
	
});