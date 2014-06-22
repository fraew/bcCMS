<?php

require('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
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

echo '</div>';
include('footer.php'); 

?>