<?php

include('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
echo '<h3>Upload Image</h3>';		

	if(logged_in())
	{ 
		upload_image_form();
	}
	else
	{
		login_form();
	}

echo '</div>';
include('footer.php'); 

?>