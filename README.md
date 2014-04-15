Author
==========================
Wayne Dunkley
www.waynedunkley.com


OneForm
==========================

OneForm was created for developers as a starting point for creating their own web forms. OneForm has simple clientside validation and hidden form field validation to help recognise human from bots and help spam filtering.

OneForm auto generates and validates content without the need for editing core js and php code.

It has been designed to be as light as possible with additional features such as a jQuery datepicker being seperated out from the main javascript and css files to keep the weight of the main package as light as possible. jQuery has been used for its simplicity and ease of use.


Required
==========================
* jQuery(v.1.10.1) is required. (this is included in the package)


How To Us
==========================
1. Upload all files to server maintaining directory structure.
2. Link to css and javascript files in header of html:

<link rel="stylesheet" type="text/css" href="res/css/oneform.css">
<script type="text/javascript" src="res/js/oneform.js"></script>

3. Copy form into website
4. Before closing body tag call oneform method and pass specified parameters

<script type="text/javascript">
	$(document).ready(function(){
		oneform({
			_id: 'contactform',
			_code: '12345',
			submit_id: 'submit-btn'
		});
	});
</script>

5. Set mailto and subject fields in the head of mailform.php

$mailTo = 'example@company.com'; //Email address to send form content to
$subject = 'New Website Enquiry'; //Subject line for company email

6. (optional) Change formCode: The form code in the hidden form field MUST match _code in oneform method call

For required fields, include a blank 'required' attribute in the input field.
Example: <input type="text" name="name" id="form-name" required>


Datepicker
==========================
A date picker has been included in the package. This has been seperated to keep the primary form as light as possible.

To use:
1. Include link to css and javascript files in head of html

<link rel="stylesheet" type="text/css" href="res/css/jquery-ui-datepicker.css">
<script type="text/javascript" src="res/js/jquery-ui-datepicker.js"></script>

2. Initialise jQuery datepicker after oneform method before the closing body tag

$('#form-datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();


Limitations
==========================
- Multiple forms can now be used on the same page, but the form tag must have unique ID's. oneform() must be called for each form.


History
==========================

v1
 - OneForm has now been upgraded to VERSION 1!
 - Submit button text changes to 'sending...' upon successful submission to show form is processing
 - Form renamed from simpleform to OneForm
 - Form parameters now passed to oneform.js from html. oneform.js no longer needs editing
 - General coding improvements to make easier to use

v0.9.3
 - A datepicker widget has now been added to the default form, with Javascript validate if set as a required field

v0.9.2.3
 - Added fallback support for placeholder text for Internet Explorer (all versions)

v0.9.2.2
 - Code improvements, PHP form fields are initialised and included in email automatically. Core PHP no longer needs editing
 - Confirmation Email checkbox now works!

v0.9.2.1
 - Bug fixes

v0.9.2
 - Add dropdown select menu to form
 - Added optional validation for dropdown select menu
 - Error message added for unsuccessful form submission

v0.9.1
 - Add updateable fields in head of simpleform.js. 
 - Now able to select which fields to validate in head of .js
 - Added company field
 - Now able to set whether confirmation email is sent or not
 - Added validation for phone number
 - Added styling for dropdown lists <select>

v0.9