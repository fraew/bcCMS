<?php

include('functions.php');
include('header.php'); 

if(setup_complete() == false) { database_setup(); echo 'Click <a href="index.php">here</a> to refresh the page.' ;}

?>

	  <div class="container-fluid">
		<div class="row-fluid">
          <div class="sidebar-nav left">
		    <?php recent_videos(); ?>
		  </div>

          <div class="sidebar-nav right">
		    <?php popular_tags(); ?>
		  </div>

          <div class="content fixed-fixed">
		    <?php display_posts(); ?>
		  </div>
		</div>
	  </div>
	  
<?php include('footer.php'); ?>