Author
==========================
Wayne Dunkley
www.waynedunkley.com


Simple ContactForm
==========================

Simple contact form is a simple form with client side required field and email validation. It was created by Wayne Dunkley.


Required
==========================
* jQuery must be use on the webiste.


How To Us
==========================
1. Upload all files and reference.
2. Make sure validation.js is linked to after the jQuery script.
3. Copy form into website
4. Set the $mailTo variable in mailform.php to the email you would like form submission to go to.
5. (optional) Change formCode: The form code in the hidden form field MUST match the formCode in simpleform.js


Limitations
==========================
- can only use one form per page


History
==========================

v0.9.2.2
 - Code improvements, PHP form fields are initialised and included in email automatically. Core PHP no longer needs editing

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