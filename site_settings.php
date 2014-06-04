<?php

require('functions.php');
include('header.php'); 

if(logged_in())
{ 
	echo '<h3>Administration Tasks</h3>';
	site_settings_form();
}
else
{
	login_form();
}

include('footer.php'); 

?>