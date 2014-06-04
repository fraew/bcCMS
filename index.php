<?php

include('functions.php');
include('header.php'); 

if(setup_complete() == false) { database_setup(); echo 'Click <a href="index.php">here</a> to refresh the page.' ;}

?>



<div id="posts">
	<?php display_posts(10); ?>
</div>



<?php 

include('footer.php'); 

?>