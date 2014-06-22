<?php

include('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
echo '<h3>Edit User Profile</h3>';		

	if(logged_in())
	{ 
		edit_user_form(false);
	}
	else
	{
		login_form();
	}

echo '</div>';
include('footer.php'); 

?>