<?php

require('functions.php');
include('header.php'); 

echo '<h3>Edit Category</h3>';	

	if(logged_in())
	{ 
		edit_category_submit();
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>