<?php

require('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
echo '<h3>Create Category</h3>';		

	if(logged_in())
	{ 
		edit_category_form(true);
	}
	else
	{
		login_form();
	}

echo '</div>';
include('footer.php'); 

?>