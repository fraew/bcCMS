<?php

require('functions.php');
include('header.php'); 

echo '<h3>Edit Post</h3>';		

	if(logged_in())
	{ 
		edit_post_form(false);
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>