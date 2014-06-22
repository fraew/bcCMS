<?php

require('functions.php');
include('header.php'); 

echo '<h3>Fix Tags</h3>';		

	if(logged_in())
	{ 
		fix_tags();
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>