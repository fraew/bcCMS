<?php

include('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
	echo '<h3>Log In</h3>';	
	login_form();

	echo '<h3>Create new user account</h3>';
	edit_user_form(true);

echo '</div>';
include('footer.php'); 

?>