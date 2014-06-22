<?php

require('functions.php');
include('header.php'); 

echo '<div class="container-fluid">';
echo '<h3>Create Comment</h3>';	

if(logged_in())
{ 
	comment_submit();
}
else
{
	login_form();
}

echo '</div>';
include('footer.php'); 

?>