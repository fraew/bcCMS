<?php

require('functions.php');
include('header.php'); 

echo '<h3>Create Post</h3>';		

	if(logged_in())
	{ 
		edit_post_form(true);
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>