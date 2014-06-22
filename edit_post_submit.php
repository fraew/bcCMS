<?php

include('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
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

echo '</div>';
include('footer.php'); 

?>