<?php

include('functions.php');
include('header.php'); 

	echo '<h3>Log In</h3>';	
	login_form();

	echo '<h3>Create new user account</h3>';
	edit_user_form(true);

include('footer.php'); 

?>