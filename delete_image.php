<?php

require('functions.php');
include('header.php'); 

echo '<h3>Delete Image</h3>';		

if(logged_in())
{ 
	delete_image();
}
else
{
	login_form();
}

include('footer.php'); 

?>