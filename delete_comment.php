<?php

require('functions.php');
include('header.php'); 

echo '<h3>Delete Comment</h3>';		

if(logged_in())
{ 
	delete_comment_submit();
}
else
{
	login_form();
}

include('footer.php'); 

?>