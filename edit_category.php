<?php

require('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
echo '<h3>Edit Category</h3>';		

	if(logged_in())
	{ 
		edit_category_form(false);
	}
	else
	{
		login_form();
	}

echo '</div>';
include('footer.php'); 

?>