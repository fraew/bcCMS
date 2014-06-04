<?php

include('functions.php');
include('header.php'); 

echo '<h3>Create User Profile</h3>';	

	if(logged_in())
	{ 
		edit_user_form(true);
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>