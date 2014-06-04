<?php

include('functions.php');
include('header.php'); 

if(setup_complete())
{
	if(logged_in())
	{ 
	?>
		<h3>Administration Tasks</h3>
		<ul>
		<li><a href="create_user.php">Create User</a></li>
		<li><a href="site_settings.php">Edit Site Settings</a></li>
		<li><a href="truncate_tables.php">Truncate Tables</a></li>
		</ul>
		
		<h3>Content Creation and Administration</h3>
		<ul>
		<li><a href="create_post.php">Create Post</a></li>
		<li><a href="create_video.php">Create Video Post</a></li>
		<li><a href="upload_image.php">Upload Image</a></li>
		<li><a href="create_category.php">Create Category</a></li>
		<li><a href="display_image_library.php">Display Image Library</a></li>
		<li><a href="index.php?drafts=true">Display Draft Posts</a></li>
		</ul>
	<?php
	}
	else
	{
		login_form();
	}
}
else
{
	$_SESSION['user_id'] = 0;	?>
		<h3>Administration Tasks</h3>
		<ul>
		<li><a href="create_user.php">Create User</a></li>
		<li><a href="edit_settings.php">Edit Site Settings</a></li>
		<li><a href="truncate_tables.php">Truncate Tables</a></li>
		</ul>
	<?php
}

include('footer.php'); 

?>