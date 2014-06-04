<?php

include('functions.php');
include('header.php'); 

echo '<h3>Edit Post</h3>';	

	if(logged_in())
	{ 
		edit_post_submit();
		update_tags();
	}
	else
	{
		login_form();
	}

include('footer.php'); 

?>