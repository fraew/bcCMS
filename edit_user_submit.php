<?php

include('functions.php');
include('header.php'); 

echo '<h3>Edit User Profile</h3>';		

	if(logged_in())
	{ 
		edit_user_submit();
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>