<?php

include('functions.php');
include('header.php'); 

echo '<h3>Upload Image</h3>';		

	if(logged_in())
	{ 
		upload_image_form();
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>