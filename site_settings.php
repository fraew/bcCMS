<?php

require('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
if(logged_in())
{ 
	echo '<h3>Administration Tasks</h3>';
	site_settings_form();
}
else
{
	login_form();
}

echo '</div>';
include('footer.php'); 

?>