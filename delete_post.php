<?php

require('functions.php');
include('header.php'); 

echo '<h3>Delete Post</h3>';		

if(logged_in())
{ 
	delete_post();
	update_tags();
}
else
{
	login_form();
}

include('footer.php'); 

?>