<?php

require('functions.php');
include('header.php'); 

echo '<h3>Create Video Post</h3>';		

	if(logged_in())
	{ 
		edit_video_form(true);
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>