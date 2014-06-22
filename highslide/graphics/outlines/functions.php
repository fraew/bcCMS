<?php
############################################## CMS and Website Settings ###################################################
//global cms settings, pulled from the config.ini file
$ini_array = parse_ini_file("config/config.ini");

$host = $ini_array['host'];
$user = $ini_array['user'];
$password = $ini_array['password'];
$database = $ini_array['database'];

//user-defined website settings, stored in the mysql database
function website_settings()
{
	$sql = 'SELECT * from settings';
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			switch($row['setting_name'])
			{
				case "Website Title": $GLOBALS['website_title'] = $row['setting_value']; 
				case "Website Subtitle": $GLOBALS['website_subtitle'] = $row['setting_value']; 
				case "Medium Thumb-Size": $GLOBALS['medium_thumb_size'] = $row['setting_value']; 
				case "Small Thumb-Size": $GLOBALS['small_thumb_size'] = $row['setting_value']; 
				case "Facebook Link": $GLOBALS['facebook_link'] = $row['setting_value'];
				case "Twitter Link": $GLOBALS['twitter_link'] = $row['setting_value']; 
				case "Instagram Link": $GLOBALS['instagram_link'] = $row['setting_value'];
				case "Tumblr Link": $GLOBALS['tumblr_link'] = $row['setting_value'];
				case "Posts Limit": $GLOBALS['posts_limit'] = $row['setting_value'];
				case "Videos Limit": $GLOBALS['videos_limit'] = $row['setting_value'];
				case "Tags Limit": $GLOBALS['tags_limit'] = $row['setting_value'];
				case "Photos Limit": $GLOBALS['photos_limit'] = $row['setting_value'];
			}
		}
	}
}
###########################################################################################################################




############################################## Configure Site Settings ###################################################

function site_settings_form()
{
	$sql = 'SELECT * from settings';
	$result = sql_select($sql);
	while ($row = mysqli_fetch_assoc($result)) 
	{
		switch($row['setting_name'])
		{
			case "Website Title": $website_title = $row['setting_value']; 
			case "Website Subtitle": $website_subtitle = $row['setting_value']; 
			case "Medium Thumb-Size": $medium_thumb_size = $row['setting_value']; 
			case "Small Thumb-Size": $small_thumb_size = $row['setting_value']; 
			case "Facebook Link": $facebook_link = $row['setting_value'];
			case "Twitter Link": $twitter_link = $row['setting_value']; 
			case "Instagram Link": $instagram_link = $row['setting_value'];
			case "Tumblr Link": $tumblr_link = $row['setting_value'];
			case "Posts Limit": $posts_limit = $row['setting_value'];
			case "Videos Limit": $videos_limit = $row['setting_value'];
			case "Tags Limit": $tags_limit = $row['setting_value'];
			case "Photos Limit": $photos_limit = $row['setting_value'];
		}
	}
		
	echo '<form action="site_settings_submit.php?refresh=5&url=index.php" method="post">';
		echo '<fieldset>';
			echo '<label for="website_title">Website Title</label><br><textarea id="website_title" name="website_title" style="width:100%;height:50px">'.$website_title.'</textarea><br>';
			echo '<label for="website_subtitle">Website Subtitle</label><br><textarea id="website_subtitle" name="website_subtitle" style="width:100%;height:50px">'.$website_subtitle.'</textarea><br>';
			echo '<label for="medium_thumb_size">Medium Thumb-Size</label><input type="text" id="medium_thumb_size" name="medium_thumb_size" value="'.$medium_thumb_size.'" />';
			echo '<label for="small_thumb_size">Small Thumb-Size</label><input type="text" id="small_thumb_size" name="small_thumb_size" value="'.$small_thumb_size.'" /><br>';
			echo '<label for="facebook_link">Facebook Link</label><br><input type="text" id="facebook_link" name="facebook_link" value="'.$facebook_link.'" style="width:50%;" /><br>';
			echo '<label for="twitter_link">Twitter Link</label><br><input type="text" id="twitter_link" name="twitter_link" value="'.$twitter_link.'" style="width:50%;" /><br>';
			echo '<label for="instagram_link">Instagram Link</label><br><input type="text" id="instagram_link" name="instagram_link" value="'.$instagram_link.'" style="width:50%;" /><br>';
			echo '<label for="tumblr_link">Tumblr Link</label><br><input type="text" id="tumblr_link" name="tumblr_link" value="'.$tumblr_link.'" style="width:50%;" /><br>';
			echo '<label for="posts_limit">Posts Limit</label><br><input type="text" id="posts_limit" name="posts_limit" value="'.$posts_limit.'" style="width:50%;" /><br>';
			echo '<label for="videos_limit">Videos Limit</label><br><input type="text" id="videos_limit" name="videos_limit" value="'.$videos_limit.'" style="width:50%;" /><br>';
			echo '<label for="tags_limit">Tags Limit</label><br><input type="text" id="tags_limit" name="tags_limit" value="'.$tags_limit.'" style="width:50%;" /><br>';
			echo '<label for="photos_limit">Photos Limit</label><br><input type="text" id="photos_limit" name="photos_limit" value="'.$photos_limit.'" style="width:50%;" /><br>';
			echo '<input type="submit" value="Submit Changes" />';
		echo '</fieldset>';
	echo '</form>';
}

function site_settings_submit()
{
	global $website_title;
	global $website_subtitle;
	global $medium_thumb_size;
	global $small_thumb_size;
	global $facebook_link;
	global $twitter_link;
	global $instagram_link;
	global $tumblr_link;
	global $posts_limit;
	global $videos_limit;
	global $tags_limit;
	global $photos_limit;
	
	if($_POST['website_title'] != $website_title) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['website_title'].'" WHERE setting_name = "Website Title"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Website Title updated.<br>'; 
		} 
	}
	
	if($_POST['website_subtitle'] != $website_subtitle) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['website_subtitle'].'" WHERE setting_name = "Website Subtitle"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Website Subtitle updated.<br>'; 
		} 
	}	
	
	if($_POST['post_thumb_size'] != $post_thumb_size) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['medium_thumb_size'].'" WHERE setting_name = "Medium Thumb-Size"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Medium Thumb-Size updated.<br>'; 
		} 
	}
	
	if($_POST['tiny_thumb_size'] != $tiny_thumb_size) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['small_thumb_size'].'" WHERE setting_name = "Small Thumb-Size"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Small Thumb-Size updated.<br>'; 
		} 
	}
	
	if($_POST['facebook_link'] != $facebook_link) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['facebook_link'].'" WHERE setting_name = "Facebook Link"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Facebook Link updated.<br>'; 
		} 
	}
	
	if($_POST['twitter_link'] != $twitter_link) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['twitter_link'].'" WHERE setting_name = "Twitter Link"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Twitter Link updated.<br>'; 
		} 
	}	
	
	if($_POST['instagram_link'] != $instagram_link) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['instagram_link'].'" WHERE setting_name = "Instagram Link"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Instagram Link updated.<br>'; 
		} 
	}
	
	if($_POST['tumblr_link'] != $tumblr_link) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['tumblr_link'].'" WHERE setting_name = "Tumblr Link"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Tumblr Link updated.<br>'; 
		} 
	}
	
	if($_POST['posts_limit'] != $posts_limit) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['posts_limit'].'" WHERE setting_name = "Posts Limit"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Posts Limit updated.<br>'; 
		} 
	}
		
	if($_POST['videos_limit'] != $videos_limit) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['videos_limit'].'" WHERE setting_name = "Videos Limit"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Videos Limit updated.<br>'; 
		} 
	}
		
	if($_POST['tags_limit'] != $tags_limit) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['tags_limit'].'" WHERE setting_name = "Tags Limit"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Tags Limit updated.<br>'; 
		} 
	}
		
	if($_POST['photos_limit'] != $photos_limit) 
	{ 
		$sql = 'UPDATE settings SET setting_value = "'.$_POST['photos_limit'].'" WHERE setting_name = "Photos Limit"'; 
		if(sql_update($sql)) 
		{ 
			echo 'Photos Limit updated.<br>'; 
		} 
	}
}

###########################################################################################################################




############################################## Database Setup Functions ###################################################

//check if there are any records in the user table
function setup_complete()
{
	$sql = 'SELECT * from users';
	$result = sql_select($sql);
	if($result)
	{
		$return = mysqli_num_rows($result);
		return $return;
	}
	else
	{
		return false;
	}
}

//initial database population
function database_setup()
{
	$sql = 'CREATE TABLE if not exists settings	( setting_name varchar(255) NOT NULL, setting_value varchar(255), PRIMARY KEY (setting_name))';
	if(sql_update($sql)) { echo 'Settings Table Created<br>'; }
	
	$sql = 'SELECT * from settings WHERE setting_name = "Website Title"';
	$result = sql_select($sql);
	if(!$result)
	{
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Website Title", "simpleCMS DEMO Site")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Website Subtitle", "")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Medium Thumb-Size", "250")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Small Thumb-Size", "100")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Facebook Link", "")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Twitter Link", "")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Instagram Link", "")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Tumblr Link", "")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Posts Limit", "20")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Videos Limit", "5")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Tags Limit", "20")';
		sql_update($sql);
		$sql = 'INSERT INTO settings (setting_name, setting_value) VALUES("Photos Limit", "20")';
		sql_update($sql);
	}

	$sql = 'CREATE TABLE if not exists users		( user_id int(11) NOT NULL auto_increment, user_admin binary(1) NOT NULL DEFAULT 0, user_name varchar(20) NOT NULL, user_password char(40) NOT NULL, user_image varchar(255), PRIMARY KEY (user_id), UNIQUE KEY user_name (user_name))';
	if(sql_update($sql)) { echo 'User Table Created<br>'; }

	$sql = 'CREATE TABLE if not exists posts		( post_id int(11) NOT NULL auto_increment, post_status binary(1) NOT NULL DEFAULT 0, post_video binary(1) NOT NULL DEFAULT 0, post_title varchar(255) NOT NULL, post_date datetime, post_content longtext, post_summary longtext, post_image varchar(255), post_cat_id int(11), PRIMARY KEY (post_id))';
	if(sql_update($sql)) { echo 'Post Table Created<br>'; }

	$sql = 'CREATE TABLE if not exists cats			( cat_id int(11) NOT NULL auto_increment, cat_name varchar(20) NOT NULL, cat_image varchar(255), cat_summary longtext, parent_cat_id int(11), cat_order_id int(11), PRIMARY KEY (cat_id), UNIQUE KEY cat_name (cat_name))';
	if(sql_update($sql)) { echo 'Category Table Created<br>'; }

	$sql = 'CREATE TABLE if not exists tags			( tag_id int(11) NOT NULL auto_increment, tag_name varchar(20) NOT NULL, post_id int(11), PRIMARY KEY (tag_id))';
	if(sql_update($sql)) { echo 'Tag Table Created<br>'; }

	$sql = 'CREATE TABLE if not exists images			( image_id int(11) NOT NULL auto_increment, image_filename varchar(255) NOT NULL, image_upload_date datetime, PRIMARY KEY (image_id))';
	if(sql_update($sql)) { echo 'Image Table Created<br>'; }
	
	$sql = 'CREATE TABLE if not exists comments			( comment_id int(11) NOT NULL auto_increment, comment_post_id int(11) NOT NULL, comment_user_id int(11) NOT NULL, comment_content longtext, comment_date datetime, PRIMARY KEY (comment_id))';
	if(sql_update($sql)) { echo 'Comment Table Created<br>'; }
}

//admin task to clear out tables
function truncate_table($table_name)
{
	$sql="TRUNCATE TABLE ".$table_name;
	if(sql_update($sql)) { echo "Completed truncating table: ".$table_name."<br>"; }
}

###########################################################################################################################

############################################## Login Functions ############################################################
// Log in function checks session cookie and returns if the user is an admin
function logged_in()
{
	if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		$sql = 'SELECT * from users where user_id = '.$user_id;
		$result = sql_select($sql);
		if(!$result)
		{
			return false;
		}
		else
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if($row['user_admin'] == 1)
				{ 
					return 'admin';
				}
				else
				{
					return 'user';
				}
			}
		}
	}
	else
	{
	return false;
	}
}

function log_out()
{
	unset( $_SESSION['user_id'] );
	echo 'You are now logged out.';
}

function login_form()
{
	$url = $_SERVER['HTTP_REFERER'];

	echo '<div class="form-box">';
		echo '<form action="login_submit.php?refresh=10&url='.$url.'" method="post"><fieldset>';
		echo '<label for="user_name">Username</label><br><input type="text" id="user_name" name="user_name" value="" maxlength="20" /><br>';
		echo '<label for="user_password">Password</label><br><input type="password" id="user_password" name="user_password" value="" maxlength="20" /><br><br>';
		echo '<input type="submit" value="Login" /></fieldset></form>';
	echo '</div>';
}

function login_submit()
{
	unset( $_SESSION['user_id'] );
	
	if (strlen( $_POST['user_name']) > 20 || strlen($_POST['user_name']) < 4) { $message =  'Incorrect Length for Username'; }
	elseif (strlen( $_POST['user_password']) > 20 || strlen($_POST['user_password']) < 4) { $message =  'Incorrect Length for Password'; }
	elseif (ctype_alnum($_POST['user_name']) != true) { $message = "Username must be alpha numeric"; }
	else
	{
		$form_user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
		$form_user_password = sha1(filter_var($_POST['user_password'], FILTER_SANITIZE_STRING));

		$sql = 'SELECT user_id FROM users WHERE user_name = "'.$form_user_name.'" AND user_password = "'.$form_user_password.'"';
		
		$result = sql_select($sql);
		if(!$result)
		{
			$message = "Incorrect User Name or Password.";
		}
		else
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if($row['user_id'] == false)
				{ 
					$message = 'Login Failed'; 
				}
				else
				{
					$_SESSION['user_id'] = $row['user_id'];
					$message = 'You are now logged in';
				}
			}
		}
		echo $message;
	}
}

###########################################################################################################################

############################################## User Setup Functions #######################################################

//create new user, non-admin by default but admins have the ability to define accounts as admin
function edit_user_form($create_user)
{ 
	$url = $_SERVER['HTTP_REFERER'];
	
	if(setup_complete() == 0)
	{
		$user_admin = 1; 
	}
	else
	{
		$user_admin = 0; 
	}
	
	$sql = 'SELECT * from users WHERE user_id = '.$_SESSION['user_id'];
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$user_name = $row['user_name'];
			$user_password = $row['user_password'];
			$user_image = $row['user_image'];
		}
	}

	echo '<div class="form-box">';
		if($user_image != '') 
		{
			global $small_thumb_size;
			echo '<div class="right"><a href="images/full/'.$user_image.'" class="highslide" onclick="return hs.expand(this)"><img src="images/'.$small_thumb_size.'/'.$user_image.'"></a></div>';
		}
		echo '<form action="create_user_submit.php?refresh=10&url='.$url.'" method="post" enctype="multipart/form-data">';
			echo '<fieldset>';
				echo '<label for="user_name">Username</label><br><input type="text" id="user_name" name="user_name" value="'.$user_name.'" maxlength="20" /><br>';
				echo '<label for="user_password">Password</label><br><input type="password" id="user_password" name="user_password" value="'.$user_password.'" maxlength="20" />';
				
				if(logged_in() == 'admin' ) 
					{ echo '<label for="user_admin">Admin Account</label><select type="text" id="user_admin" name="user_admin"><option value="0" selected="selected">No</option><option value="1">Yes</option></select><br>'; } 
				else
					{ echo '<input type="hidden" id="user_admin" name="user_admin" value="'.$user_admin.'"></input><br>'; }
				
				echo '<label for"file">Upload New User Image</label><br><input id="file" type="file" name="file"/></input><br><br>';
				echo '<input type="hidden" name="form_token" value="'.$form_token.'" /><input type="hidden" name="create_user" value="'.$create_user.'" /><input type="submit" value="Submit" />';
			echo '</fieldset>';
		echo '</form>';
	echo '</div>';
}

function edit_user_submit()
{
	$create_user = $_POST['create_user'];
	
	if( $_POST['form_token'] != $_SESSION['form_token']) { $message = 'Invalid form submission'; }
	elseif (strlen( $_POST['user_name']) > 20 || strlen($_POST['user_name']) < 4) { $message = 'Incorrect Length for Username'; }
	elseif (strlen( $_POST['user_password']) > 20 || strlen($_POST['user_password']) < 4) { $message = 'Incorrect Length for Password'; }
	elseif (ctype_alnum($_POST['user_name']) != true) { $message = "Username must be alpha numeric"; }
	else 
	{
		$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
		$user_password = sha1(filter_var($_POST['user_password'], FILTER_SANITIZE_STRING));
		
		try
		{
		
			if(($_FILES['file']['name']) != '')
			{
				$allowed_filetypes = array('.jpg','.jpeg');
				$max_filesize = 10485760;
				$upload_path = 'images/full/';
				$user_image = $_FILES['file']['name'];
				$ext = substr($user_image, strpos($user_image,'.'), strlen($user_image)-1);

				if(!in_array($ext,$allowed_filetypes)) { die('The file you attempted to upload is not allowed.');} 
				if(filesize($_FILES['file']['tmp_name']) > $max_filesize) { die('The file you attempted to upload is too large.'); }
				if(!is_writable($upload_path)) { die('You cannot upload to the specified directory, please CHMOD it to 777.'); }
				if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path . $user_image)) 
				{
					create_thumbnails($user_image,250);
					create_thumbnails($user_image,100);
					if($create_user == true) 
					{ 
						$sql = 'INSERT INTO users(user_name, user_admin, user_password, user_image) VALUES ("'.$user_name.'", '.$_POST['user_admin'].', "'.$user_password.'", "'.$user_image.'")';
					}
					else
					{
						$sql = 'UPDATE users set user_name = "'.$user_name.'", user_password = "'.$user_password.'", user_image =  "'.$user_image.'" WHERE user_id = '.$_SESSION['user_id'];
					}
				}			
			}
			else
			{
				if($create_user == true) 
				{ 
					$sql = 'INSERT INTO users(user_name, user_admin, user_password) VALUES ("'.$user_name.'", '.$_POST['user_admin'].', "'.$user_password.'")';
				}
				else
				{
					$sql = 'UPDATE users set user_name = "'.$user_name.'", user_password = "'.$user_password.'" WHERE user_id = '.$_SESSION['user_id'];
				}
			}
						
			if(sql_update($sql));
			{
				unset( $_SESSION['form_token'] );
				$message = 'New user added.<br>';
			}
		}
		catch(Exception $e)
		{
			if( $e->getCode() == 23000) { $message = 'Username already exists'; }
			else { $message = 'We are unable to process your request. Please try again later.';	}
		}
		
	}
	
	echo '<div id="out">'.$message.'</div>';
}

###########################################################################################################################

############################################## Display Content Functions ##################################################

function display_posts()
{
	GLOBAL $posts_limit;

	//check page flags to modify returned results
	if($_GET['id']) 
	{ 
		$id = true;
		$where = 'WHERE posts.post_id = '.$_GET['id']; 
	}
	else
	{
		$id = false;
		if($_GET['cat']) 
		{ 
			$where = 'WHERE posts.post_cat_id = '.($_GET['cat']).' and posts.post_status <> 0';   
			$nav = 'cat='.$_GET['cat'];
		}
		elseif($_GET['tag']) 
		{ 
			$where = 'JOIN tags on posts.post_id = tags.post_id WHERE tags.tag_name = "'.($_GET['tag']).'" and posts.post_status = 1 and posts.post_video = 0';  
			$nav = 'tag='.$_GET['tag'];
			echo '<div class="post-title"><h3>Posts with the Tag: '.($_GET['tag']).'</h3></div>';
		}
		elseif($_GET['drafts'] == 'true') 
		{ 
			$where = 'WHERE posts.post_status = 0 and posts.post_video = 0';   
			$nav = 'drafts=true';
		}
		else 
		{ 
			$where = 'WHERE posts.post_status = 1 and posts.post_video = 0';  
		}
		
		if($_GET['last_id']) 
		{
			$where = $where.' AND posts.post_id < '.$_GET['last_id'];
		}
	}

	$sql = 'SELECT posts.post_id, posts.post_title, posts.post_video, posts.post_date, posts.post_date, posts.post_image, posts.post_summary, posts.post_content, posts.post_status, p.cat_name as parent_cat_name, cats.cat_name FROM posts LEFT JOIN cats on posts.post_cat_id = cats.cat_id LEFT JOIN cats p on cats.parent_cat_id = p.cat_id '.$where.' ORDER BY posts.post_id DESC LIMIT '.$posts_limit;
	
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_date = $row['post_date'];
			if($row['post_image'] == ' '){ $image = false; } else { $image = true; }
			$post_image = $row['post_image'];
			$post_summary = $row['post_summary'];
			$post_content = $row['post_content'];
			$post_status = $row['post_status'];
			$post_video = $row['post_video'];
			$post_category = $row['cat_name'];
			if($row['parent_cat_name']) { $post_category = $row['parent_cat_name'].' > '.$post_category; }

			if($id) 
			{
				echo '<div class="post">';
					echo '<div class="post-title"><h3><a href="index.php?id='.$post_id.'">'.$post_title.'</a>';
					if(logged_in() == 'admin') { echo ' [<a href="edit_post.php?id='.$post_id.'">edit</a>]'; } 
					echo '</h3></div>';
					if($post_status == 1) { echo '<div class="post-date">Posted on: '.$post_date.'</div>'; }
					echo '<div class="post-content">';
					echo $post_content.'</div>';
					echo '<div class="post-tags"><ul>';

					$sql = 'SELECT * FROM tags where post_id = '.$post_id;
					$subresult = sql_select($sql);
					if($subresult)
					{
						while ($subrow = mysqli_fetch_assoc($subresult)) 
						{
							echo '<li><a href="index.php?tag='.$subrow['tag_name'].'">'.$subrow['tag_name'].'</a></li>';
						}
					}
					
					echo '</ul></div>';
					echo '<div class="clear"></div>';
					
					display_comments($post_id);
					if(logged_in()) { comments_form($post_id); }
					echo '<div class="clear"></div>';
					
				echo '</div>';
			}
			else
			{
				$sql = 'select count(*) as comment_count from comments where comment_post_id = '.$post_id;
				$subresult = sql_select($sql);
				if($subresult)
				{
					while ($subrow = mysqli_fetch_assoc($subresult)) 
					{
						$comment_count = $subrow['comment_count'];
					}
				}

				if($post_status == 2)
				{
					//draft posts - only visible to admins
					echo '<div class="post" style="background-image:url(images/full/'.$row['post_image'].');background-repeat:no-repeat">';
					echo '<div class="post-summary"><div class="post-title"><h3>'.$post_title;
					if(logged_in() == 'admin') { echo ' [<a href="edit_post.php?id='.$post_id.'">edit</a>]'; } 
					echo '</h3></div>';
					echo $post_summary;
					echo '</div></div>';
				}
				else
				{
					echo '<div class="post-container" ';
						if($image == true) { echo "style=background-image:url('images/full/'.$row['post_image']."');background-repeat:no-repeat;"; }
						echo '>';
						echo '<div class="post-summary">';
							echo '<div class="post-title"><h3>';
							echo '<a href="index.php?id='.$post_id.'">'.$post_title.'</a>';
								if(logged_in() == 'admin') { echo ' [<a href="edit_post.php?id='.$post_id.'">edit</a>]'; } 
							echo '</h3></div>';
						echo $post_summary.'<div class="post-category">'.$post_category;
						if($comment_count > 0) { echo ' | '.$comment_count.' Comment(s)'; }
						echo '</div></div>';
					echo '</div>';
				}
			}
		}
	}
	
	$sql = 'SELECT * FROM posts '.$where.' AND post_id < "'.$post_id.'" ORDER BY post_date DESC LIMIT '.$limit;
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$nav = $nav.'&last_id='.$post_id;
		}
		echo '<div id="nav"><a href="index.php?'.$nav.'">Next Page -> </a></div>'; 
	}
	
	if($_GET['cat']) 
	{ 
		$sql = 'SELECT * FROM cats where parent_cat_id = '.$_GET['cat'].' order by cat_order_id';
		$result = sql_select($sql);
		if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				if($row['cat_image'] == ' '){ $image = false; } else { $image = true; }
				
				echo '<div class="post-container" ';
					if($image == true) { echo 'style=background-image:url(images/full/'.$row['cat_image'].');background-repeat:no-repeat;'; }
					echo '>';
					echo '<div class="post-summary">';
						echo '<div class="post-title">';
							echo '<h3><a href="index.php?cat='.$row['cat_id'].'">'.$row['cat_name'].'</a>';
							if(logged_in() == 'admin') { echo ' [<a href="edit_category.php?cat='.$row['cat_id'].'">edit</a>]'; } 
							echo '</h3>';
							echo $row['cat_summary'];
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}
	}
}

function display_comments($post_id)
{
	global $small_thumb_size;
	echo '<div class="post-comments">';
		$sql = 'SELECT * from comments JOIN users on comments.comment_user_id = users.user_id WHERE comments.comment_post_id = '.$post_id;
		$result = sql_select($sql);
		if($result)
		{
			echo '<div class="sub-title">Post Comments ['.mysqli_num_rows($result).']</div>';
			while ($row = mysqli_fetch_assoc($result)) 
				{
				echo '<div class="post-comment">';
					if($row['user_image'] and $row['user_image'] != ' ') { echo '<div class="tiny-thumb"><a href="images/full/'.$row['user_image'].'" class="highslide" onclick="return hs.expand(this)"><img src="images/'.$small_thumb_size.'/'.$row['user_image'].'"></a></div>'; }
					echo '<div class="comment-details"><b>Comment by '.$row['user_name'].' on '.$row['comment_date'].'</b></div>';
					echo '<div class="comment-content">'.$row['comment_content'].'</div>';
					if(logged_in() == 'admin') 
					{
						echo '<div class="right"><form action="delete_comment.php?refresh=5" method="post"><button name="comment_id" type="submit" value="'.$row['comment_id'].'">Delete Comment</button></form></div>';
					}
					echo '<div class="clear"></div>';
				echo '</div>';
				}
		}
		else
		{
			echo '<div class="sub-title">No Comments</div><div class="clear"></div>';
		}
	echo '</div>';
}

function display_cats($parent, $level, $type, $selected_cat_id)
{
	$sql = 'SELECT a.cat_id, a.cat_name, a.cat_order_id, Deriv1.Count FROM cats a  LEFT OUTER JOIN (SELECT parent_cat_id, COUNT(*) AS Count FROM cats GROUP BY parent_cat_id) Deriv1 ON a.cat_id = Deriv1.parent_cat_id WHERE a.parent_cat_id='.$parent.' ORDER BY a.cat_order_id';
	$result = sql_select($sql);
	if($result)
	{
		if($type == 'dropdown')
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$cat_id = $row['cat_id'];
				$cat_name = $row['cat_name'];
				
				if($type == 'dropdown')
				{
					if ($row['Count'] > 0) 
					{
						echo '<option value="'.$cat_id.'" ';
						if($cat_id == $selected_cat_id) { echo 'selected="selected"'; }
						echo '>'.$cat_name.'</option>';
						display_cats($row['cat_id'], $level + 1, 'dropdown', $selected_cat_id);
					} 	
					elseif ($row['Count']==0) 
					{
						if($parent == 0) { $space = ''; } else { $space = '---'; }
						echo '<option value="'.$cat_id.'" ';
						if($cat_id == $selected_cat_id) { echo 'selected="selected"'; }
						echo '>'.$space.$cat_name.'</option>';
					}
				}
			}
		}
		if($type == 'menu')
		{
			echo '<ul>';
			while ($row = mysqli_fetch_assoc($result)) 
			{		
				$cat_id = $row['cat_id'];
				$cat_name = $row['cat_name'];
			
				if ($row['Count'] > 0) 
				{
					echo '<li><a href="index.php?cat='.$row['cat_id'].'">'.$row['cat_name'].'</a>';
					if(logged_in() == 'admin') { echo ' [<a href="edit_category.php?cat='.$row['cat_id'].'">edit</a>]'; }
					echo '</li>';
					display_cats($row['cat_id'], $level + 1, 'menu', $selected_cat_id);
					echo '</li>';
				} 	
				elseif ($row['Count']==0) 
				{
					echo '<li><a href="index.php?cat='.$row['cat_id'].'">'.$row['cat_name'].'</a>';
					if(logged_in() == 'admin') { echo ' [<a href="edit_category.php?cat='.$row['cat_id'].'">edit</a>]'; }
					echo '</li>';
				}
			}
			echo '</ul>';
		}
	}
}

function comments_form($post_id)
{
    echo '<div class="comments-form">';
		echo '<div class="sub-title">Post your comment</div>';
		echo '<form action="comment_submit.php?refresh=5" method="post">';
			echo '<fieldset>';
				echo '<input type="hidden" id="comment_post_id" name="comment_post_id" value="'.$post_id.'"></input>';
				echo '<input type="hidden" id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'"></input>';
				echo '<textarea id="comment_content" name="comment_content" style="width:100%;height:100px"></textarea>';
				echo '<input type="submit" value="Post Comment" />';
			echo '</fieldset>';
		echo '</form>';
	echo '</div>';
}

function recent_videos()
{
	GLOBAL $videos_limit;

	$sql = 'SELECT * from posts where post_status = 1 AND post_video = 1 ORDER BY post_id DESC LIMIT '.$videos_limit;
	$result = sql_select($sql);
	
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo '<div class="video">';
				echo '<div class="video-title">'.$row['post_title'];
				if(logged_in() == 'admin') { echo ' [<a href="edit_video.php?id='.$row['post_id'].'">Edit</a>]'; }
				echo '</div>';
				$post_video_url = str_replace('https://', '', str_replace('/watch?v=', '/embed/', $row['post_image']));
				echo '<iframe width=220 src="//'.$post_video_url.'" frameborder="0" allowfullscreen=""></iframe>';
				echo '<div class="video-summary">'.$row['post_summary'].'</div>';
			echo '</div>';
		}
	}
}

function popular_tags()
{
	GLOBAL $tags_limit;

	$sql = 'SELECT tag_name, COUNT(*) as tag_count FROM tags GROUP BY tag_name ORDER BY tag_count DESC LIMIT '.$tags_limit;

	$result = sql_select($sql);
	if($result)
	{
		echo '<ul>';
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo '<li><a href="index.php?tag='.$row['tag_name'].'">'.$row['tag_name'].'</a> ['.$row['tag_count'].']</li>'; 
		}
		echo '</ul>';
	}
}

function recent_images()
{
	global $small_thumb_size;
	global $photos_limit;
	$sql = 'SELECT * from images ORDER BY image_upload_date DESC limit '.$photos_limit;
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo '<div class="small-thumb"><a href="images/full/'.$row['image_filename'].'" class="highslide" onclick="return hs.expand(this)"><img src="images/'.$small_thumb_size.'/'.$row['image_filename'].'"></a></div>';
		}
		echo '<div class="clear"></div>';
	}
}

function display_image_library()
{

	global $medium_thumb_size; 
	$sql = 'SELECT * from images ORDER BY image_upload_date DESC';
	$result = sql_select($sql);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo '<div class="post-image"><a href="images/full/'.$row['image_filename'].'" class="highslide" onclick="return hs.expand(this)"><img src="images/'.$medium_thumb_size.'/'.$row['image_filename'].'"></a>';
			if(logged_in() == 'admin') 
			{ 
				echo '<div class="post-image-caption">[<a href="delete_image.php?id='.$row['image_id'].'&refresh=5">Delete Image</a>]</div>'; 
			} 
			echo '</div>';
		}
		echo '<div class="clear"></div>';
	}
}

###########################################################################################################################

############################################## Content Creation Functions #################################################

function edit_post_form($post_create)
{

	global $medium_thumb_size;

	if($post_create == false)
	{
		$sql = 'SELECT posts.*, cats.cat_name FROM posts JOIN cats on posts.post_cat_id = cats.cat_id WHERE posts.post_id = '.$_GET['id'];
		$result = sql_select($sql);
		if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$post_title = $row['post_title'];
				$post_content = $row['post_content'];
				$post_summary = $row['post_summary'];
				$post_image = $row['post_image'];
				$post_cat_id = $row['post_cat_id'];
				$post_cat_name = $row['cat_name'];
				$post_status = $row['post_status'];
			}
		}
	}
	
	echo '<form name="edit_post" action="edit_post_submit.php" method="post" enctype="multipart/form-data">';
	echo '<fieldset>';
	if($post_create == false) { echo '<input type="hidden" id="post_id" name="post_id" value="'.$_GET['id'].'"></input>'; }
	echo '<input type="hidden" id="post_create" name="post_create" value="'.$post_create.'"></input>';	
	echo '<input type="hidden" id="post_video" name="post_video" value="0"></input>';
	echo '<label>Title: </label><br><input type="text" id="post_title" name="post_title" style="width:100%" value="'.$post_title.'"></input><br>';
	echo '<label>Status: </label><select id="post_status" name="post_status"><option value="0" ';
	if($post_status == 0) { echo 'selected="selected"'; }
	echo '>Draft</option><option value="1" ';
	if($post_status == 1) { echo 'selected="selected"'; }
	echo '>Published</option><option value="2" ';
	if($post_status == 2) { echo 'selected="selected"'; }
	echo '>Category Only</option></select>'; 
	echo '<label>Category</label><select id="post_cat_id" name="post_cat_id">';

	display_cats(0,1,'dropdown',$post_cat_id);
					
	echo '<label>Content Summary: </label><br><textarea id="post_summary" name="post_summary" style="width:100%;height:300px">'.(htmlentities($post_summary)).'</textarea><br>';


	echo '<div class="insert-image">Insert Image in to Post<br><br>';
	echo '<label>Select Existing Image: </label><br><select id="insert_image" name="insert_image" style="width:100%;"><option value=" "> </option>';
	$sql = 'SELECT * from images';
	$result = sql_select($sql);
	if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$image_filename = $row['image_filename'];
				echo '<option value="'.$image_filename.'" ';
				if($post_image == $image_filename) { echo 'selected="selected"'; }
				echo '>'.$image_filename.'</option>';
			}
		}
	echo '</select><br><br>';
	echo '<label>Image Caption: </label><br><input type="text" id="post_image_caption" name="post_image_caption" style="width:100%"></input>';
	echo '<div class="right"><input type="button" name="add_image" value="Insert Image" onClick="addimage();"></div></div>';
	
	
	echo '<div class="insert-image">Attach Post Image<br><br>';
	echo '<label>Select Existing Image: </label><br><select id="post_image" name="post_image" style="width:100%;"><option value="'.$post_image.'"> </option>';
	$sql = 'SELECT * from images';
	$result = sql_select($sql);
	if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$image_filename = $row['image_filename'];
				echo '<option value="'.$image_filename.'" ';
				if($post_image == $image_filename) { echo 'selected="selected"'; }
				echo '>'.$image_filename.'</option>';
			}
		}
	echo '</select><br><br>';
	echo '<label>Upload New Image: </label><br><input id="file" type="file" name="file"/></input></div>';


	echo '<label>Content: </label><br><textarea id="post_content" name="post_content" style="width:60%;height:300px">'.(htmlentities($post_content)).'</textarea><br>';
		
	$sql = 'SELECT * FROM tags where post_id = '.$_GET['id'];
	$result = sql_select($sql);
	if($result)
	{
		$post_tag_array = array();
		while($row = mysqli_fetch_array($result)) 
		{ 
			array_push($post_tag_array, $row['tag_name']);
		}
		$post_tags = implode(", ", $post_tag_array);
	}	
	echo '<label>Tags: </label><br><input type="text" id="post_tags" name="post_tags" style="width:100%"value="'.$post_tags.'"></input><br>';
	echo '<input type="submit" name="edit_button" value="Edit" />';
	echo '<input type="submit" name="delete_button" value="Delete" />';
	echo'</fieldset>';
	echo '</form>';	
	
	?>
	<script language="javascript" type="text/javascript">
	function addimage() {
		var newimage = '<div class="post-image-right"><a href="images/full/' + document.edit_post.insert_image.value + '" class="highslide" onclick="return hs.expand(this)"><img src="images/<?php echo $medium_thumb_size; ?>/' + document.edit_post.insert_image.value + '"></a><div class="post-image-caption">' + document.edit_post.post_image_caption.value + '</div></div>';
		document.edit_post.post_content.value += newimage + "\n";
	}
	</script>
	<?php
}

function edit_video_form($post_create)
{
	if($post_create == false)
	{
		$sql = 'SELECT * FROM posts WHERE post_id = '.$_GET['id'];
		$result = sql_select($sql);
		if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$post_title = $row['post_title'];
				$post_image = $row['post_image'];
				$post_summary = $row['post_summary'];
				$post_id = $row['post_id'];
			}
		}
	}
	echo '<form action="edit_post_submit.php" method="post">';
		echo '<fieldset>';
			if($post_create == false) { echo '<input type="hidden" id="post_id" name="post_id" value="'.$_GET['id'].'"></input>'; }
			echo '<label>Title</label><br><input type="text" id="post_title" name="post_title" style="width:100%" value="'.$post_title.'"></input><br>';	
			echo '<input type="hidden" id="post_video" name="post_video" value="1"></input>';
			echo '<input type="hidden" id="post_status" name="post_status" value="1"></input>';
			echo '<input type="hidden" id="post_create" name="post_create" value="'.$post_create.'"></input>';
			echo '<label>Video Embed URL</label><br><input type="text" id="post_image" name="post_image" style="width:100%" value="'.$post_image.'"></input><br>';	
			echo '<label>Content Summary</label><br><textarea id="post_summary" wrap="hard" name="post_summary" style="width:100%;height:300px">'.$post_summary.'</textarea><br>';
			echo '<input type="submit" name="edit_button" value="Edit" />';
			echo '<input type="submit" name="delete_button" value="Delete" />';
		echo '</fieldset>';
	echo '</form>';
}

function edit_post_submit()
{
	global $medium_thumb_size;
	global $small_thumb_size;

	if(isset($_POST['edit_button'])) 
	{
		$post_title = $_POST['post_title'];
		$post_id = $_POST['post_id'];	
		$post_status = $_POST['post_status'];	
		$post_summary = $_POST['post_summary'];	
		$post_content = $_POST['post_content'];	
		$post_video = $_POST['post_video'];

		date_default_timezone_set('Pacific/Auckland');
		$post_date = date('Y-m-d G:i:s');
		
		if(($_FILES['file']['name']) != '')
		{
			$allowed_filetypes = array('.jpg','.jpeg');
			$max_filesize = 10485760;
			$upload_path = 'images/full/';
			$image_filename = $_FILES['file']['name'];
			$ext = substr($image_filename, strpos($image_filename,'.'), strlen($image_filename)-1);

			if(!in_array($ext,$allowed_filetypes)) { die('The file you attempted to upload is not allowed.');} 
			if(filesize($_FILES['file']['tmp_name']) > $max_filesize) { die('The file you attempted to upload is too large.'); }
			if(!is_writable($upload_path)) { die('You cannot upload to the specified directory, please CHMOD it to 777.'); }
			if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path . $image_filename)) 
			{
				$sql = 'INSERT INTO images (image_filename, image_upload_date) VALUES ("'.$image_filename.'", "'.$post_date.'")'; 
				if(sql_update($sql)) { echo 'Your file ['.$image_filename.'] was uploaded successfully.<br>'; }
				
				$post_image = $image_filename;
				
				create_thumbnails($image_filename,$medium_thumb_size);
				create_thumbnails($image_filename,$small_thumb_size);
			}
			else
			{
				echo 'There was an error during the file upload.  Please try again.';
				$post_image = $_POST['post_image'];
			}
		}
		else
		{
			$post_image = $_POST['post_image'];
		}

		if($_POST['post_cat_id']) { $post_cat_id = $_POST['post_cat_id']; } else { $post_cat_id = 0; }
		
		
		if($_POST['post_create'] == true)
		{
			$sql = 'INSERT INTO posts (post_title, post_date, post_status, post_video, post_summary, post_content, post_image, post_cat_id) VALUES ("'.$post_title.'", "'.$post_date.'", '.$post_status.', '.$post_video.', "'.$post_summary.'", "'.$post_content.'", "'.$post_image.'", '.$post_cat_id.')';		
		}
		else
		{
			$sql = 'UPDATE posts set post_title = "'.$post_title.'", post_date = "'.$post_date.'", post_status = '.$post_status.', post_video = '.$post_video.', post_summary = "'.$post_summary.'", post_content = "'.$post_content.'", post_image = "'.$post_image.'", post_cat_id = '.$post_cat_id.' where post_id = '.$post_id; 
		}
		
		if(sql_update($sql)) { echo '<h3>Updated "'.$post_title; }
	} 
	elseif(isset($_POST['delete_button'])) 
	{
		$sql = 'DELETE FROM posts where post_id = '.$_POST['post_id'];
		if(sql_update($sql)) { echo 'Deleted post '.$_POST['post_title'].'<br>'; }
		$sql = 'DELETE FROM tags where post_id = '.$_POST['post_id'];
		if(sql_update($sql)) { echo 'Deleted tag records for '.$_POST['post_title']; }
	}
}

function fix_tags()
{	
	$sql = 'SELECT post_id FROM posts WHERE post_status = 1 AND post_video = 0';
	$result = sql_select($sql);
	if($result)
	{
		$sql = 'DELETE from tags where post_id NOT IN (';
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$sql = $sql.$row['post_id'].', ';
		}
		$sql = rtrim($sql, ', ').')';
		if(sql_update($sql)) { echo 'Non-conforming tags successfully removed.'; }
	}
}

function update_tags()
{
	$id = $_GET['id'];
	IF(ISSET($_POST['post_id']))
	{ 
		$post_id = $_POST['post_id']; 
	}
	elseif($id != '')
	{
		$post_id = $id;
	}
	else
	{
		$sql = 'SELECT post_id from posts ORDER BY post_id DESC LIMIT 1';
		$result = sql_select($sql);
		if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$post_id = $row['post_id'];
			}
		}
	}
	
	$sql = 'DELETE FROM tags where post_id = '.$post_id;
	
	sql_update($sql);
	
	if($_POST['post_tags'])
	{
		$post_tags = htmlspecialchars_decode(stripslashes($_POST['post_tags']));
		$tag_names = explode(', ', $post_tags);
	
		foreach ($tag_names as $tag_name)
		{
			if($tag_name != '')
			{
				$sql = 'INSERT INTO tags (tag_name, post_id) VALUES ("'.$tag_name.'", '.$post_id.')';
				sql_update($sql);
			}
		}
	}
}

function edit_category_form($cat_create)
{
	if($cat_create == false)
	{
		$sql = 'SELECT * FROM cats where cat_id = '.$_GET['cat'];
		$result = sql_select($sql);
		if($result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$cat_id = $row['cat_id'];
				$cat_name = $row['cat_name'];
				$cat_summary = $row['cat_summary'];
				$cat_image = $row['cat_image'];
				$parent_cat_id = $row['parent_cat_id'];
				$cat_order_id = $row['cat_order_id'];
			}
		}
	}
		
	echo '<form action="edit_category_submit.php?refresh=5" method="post" enctype="multipart/form-data">';
		echo '<fieldset>';
			echo '<input type="hidden" id="cat_id" name="cat_id" value="'.$cat_id.'"></input>';
			echo '<input type="hidden" id="cat_create" name="cat_create" value="'.$cat_create.'"></input>';
			echo '<label>Name</label><br><input type="text" id="cat_name" name="cat_name" style="width:100%" value="'.$cat_name.'"></input><br><br>';
			echo '<label>Category Summary</label><br><textarea id="cat_summary" wrap="hard" name="cat_summary" style="width:100%;height:300px">'.$cat_summary.'</textarea><br>';
			
			echo '<label>Attach Existing Image: </label><select id="cat_image" name="cat_image"><option value=" "> </option>';
			$sql = 'SELECT * from images';
			$result = sql_select($sql);
			if($result)
				{
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$image_filename = $row['image_filename'];
						echo '<option value="'.$image_filename.'" ';
						if($cat_image == $image_filename) { echo 'selected="selected"'; }
						echo '>'.$image_filename.'</option>';
					}
				}
			echo '</select><br>';
			echo '<label for="file">Upload New Image: </label><input id="file" type="file" name="file"/></input><br><br>';
			
			echo '<label>Parent Category</label><select id="parent_cat_id" name="parent_cat_id"><option value="0"> </option>';
	
			$sql= 'SELECT * FROM cats';		
			$subresult = sql_select($sql);
			if($subresult)
			{
				while ($subrow = mysqli_fetch_assoc($subresult)) 
				{
					$sub_cat_id = $subrow['cat_id'];
					$sub_cat_name = $subrow['cat_name'];
					echo '<option value="'.$sub_cat_id.'" ';
					if($parent_cat_id == $sub_cat_id) { echo 'selected="selected"'; }
					echo '>'.$sub_cat_name.'</option>';
				}
			}
			echo '</select>';
			echo '<label>Category Order</label><input type="text" id="cat_order_id" name="cat_order_id" value="'.$cat_order_id.'"></input><br><br>';
			echo '<input type="submit" name="edit_button" value="Edit" />';
			echo '<input type="submit" name="delete_button" value="Delete" />';
		echo '</fieldset>';
	echo '</form>';	
}

function edit_category_submit()
{
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];
	$parent_cat_id = $_POST['parent_cat_id'];
	$cat_order_id = $_POST['cat_order_id'];
	$cat_summary = $_POST['cat_summary'];
	
	if(isset($_POST['edit_button'])) 
	{
		
		date_default_timezone_set('Pacific/Auckland');
		$image_date = date('Y-m-d G:i:s');
		
		if(($_FILES['file']['name']) != '')
		{
			$allowed_filetypes = array('.jpg','.jpeg');
			$max_filesize = 10485760;
			$upload_path = 'images/full/';
			$image_filename = $_FILES['file']['name'];
			
			$ext = substr($image_filename, strpos($image_filename,'.'), strlen($image_filename)-1);

			if(!in_array($ext,$allowed_filetypes)) { die('The file you attempted to upload is not allowed.');} 
			if(filesize($_FILES['file']['tmp_name']) > $max_filesize) { die('The file you attempted to upload is too large.'); }
			if(!is_writable($upload_path)) { die('You cannot upload to the specified directory, please CHMOD it to 777.'); }
			if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path . $image_filename)) 
			{
				$sql = 'INSERT INTO images (image_filename, image_upload_date) VALUES ("'.$image_filename.'", "'.$image_date.'")'; 
				if(sql_update($sql)) { echo 'Your file ['.$image_filename.'] was uploaded successfully.<br>'; }
				create_thumbnails($image_filename, 250);
				$cat_image = $image_filename;
			}
			else
			{
				echo 'There was an error during the file upload.  Please try again.';
				$cat_image = $_POST['cat_image'];
			}
		}
		else
		{
			$cat_image = $_POST['cat_image'];
		}
		if($_POST['cat_create'] == true)
		{
			$sql = 'INSERT INTO cats (cat_name, cat_summary, cat_image, parent_cat_id, cat_order_id) VALUES("'.$cat_name.'", "'.$cat_summary.'", "'.$cat_image.'", '.$parent_cat_id.', '.$cat_order_id.')';
		}
		else
		{
			$sql = 'UPDATE cats set cat_name = "'.$cat_name.'", cat_summary = "'.$cat_summary.'", cat_image = "'.$cat_image.'", parent_cat_id = '.$parent_cat_id.', cat_order_id = '.$cat_order_id.' WHERE cat_id = '.$cat_id;
		}
		if(sql_update($sql)) { echo '<h3>Updated "'.$cat_name; }
	}
	elseif(isset($_POST['delete_button']))
	{
		$sql = 'DELETE FROM cats where cat_id = '.$cat_id; 
		if(sql_update($sql)) { echo '<h3>Deleted "'.$cat_name; }
	}
}

function upload_image_form()
{

	$url = $_SERVER['HTTP_REFERER'];
	
	echo '<form action="upload_image_submit.php?refresh=10&url='.$url.'" method="post" enctype="multipart/form-data">';
		echo '<fieldset>';
			echo '<label>Upload New Image: </label><input id="file" type="file" name="file"/></input><br><br>';
			echo '<input type="submit" value="Upload" />';
		echo '</fieldset>';
	echo '</form>';
}

function upload_image_submit()
{
	global $medium_thumb_size;
	global $small_thumb_size;

	date_default_timezone_set('Pacific/Auckland');
	$upload_date = date('Y-m-d G:i:s');

	if(($_FILES['file']['name']) != '')
	{
		$allowed_filetypes = array('.jpg','.jpeg');
		$max_filesize = 10485760;
		$upload_path = 'images/full/';
		$image_filename = $_FILES['file']['name'];
		$ext = substr($image_filename, strpos($image_filename,'.'), strlen($image_filename)-1);

		if(!in_array($ext,$allowed_filetypes)) { die('The file you attempted to upload is not allowed.');} 
		if(filesize($_FILES['file']['tmp_name']) > $max_filesize) { die('The file you attempted to upload is too large.'); }
		if(!is_writable($upload_path)) { die('You cannot upload to the specified directory, please CHMOD it to 777.'); }
		if(move_uploaded_file($_FILES['file']['tmp_name'],$upload_path . $image_filename)) 
		{
			$sql = 'INSERT INTO images (image_filename, image_upload_date) VALUES ("'.$image_filename.'", "'.$upload_date.'")'; 
			if(sql_update($sql)) { echo 'Your file ['.$image_filename.'] was uploaded successfully.<br>'; }
			create_thumbnails($image_filename,$medium_thumb_size);
			create_thumbnails($image_filename,$small_thumb_size);
		}
		else
		{
			echo 'There was an error during the file upload.  Please try again.';
		}
	}
	else
	{
	echo 'No image selected.<br>';
	}
}

function create_thumbnails($image_filename,$image_size)
{
	$fullPath = 'images/full/'.$image_filename;
	
	if(file_exists($fullPath))
	{
		echo 'fullpath: '.$fullPath.'<br>';
		
		$full = imagecreatefromjpeg($fullPath);
		$thumbPath = 'images/'.$image_size.'/'.$image_filename;
		
		$thumbQuality = 80;
		
		$width  = imagesx($full);
		$height = imagesy($full);

		if ($height > $width) 
		{
			$divisor = $width / $image_size;
		} 
		else 
		{
			$divisor = $height / $image_size;
		}

		$resizedWidth   = ceil($width / $divisor);
		$resizedHeight  = ceil($height / $divisor);

		$thumbx = floor(($resizedWidth  - $image_size) / 2);
		$thumby = floor(($resizedHeight - $image_size) / 2);

		$resized  = imagecreatetruecolor($resizedWidth, $resizedHeight);
		$thumb    = imagecreatetruecolor($image_size, $image_size);
		imagecopyresampled($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
		imagecopyresampled($thumb, $resized, 0, 0, $thumbx, $thumby, $image_size, $image_size, $image_size, $image_size);

		imagejpeg($thumb, $thumbPath.$name, $thumbQuality);
	}
}

###########################################################################################################################

############################################## Delete Content Functions ###################################################

function delete_post()
{
	$sql = 'DELETE FROM posts where post_id = '.$_GET['id'];
	if(sql_update($sql)) { echo 'Post successfully deleted<br>'; }
}

function delete_comment()
{
	$sql = 'DELETE FROM comments where comment_id = '.$_POST['comment_id'];
	if(sql_update($sql)) { echo 'Deleted comment<br>'; }
}

function delete_image()
{
	$sql = 'DELETE FROM images where image_id = '.$_GET['id'];
	if(sql_update($sql)) { echo 'Image successfully deleted<br>'; }
}

###########################################################################################################################

############################################## SQL Functions ##############################################################

function sql_select($sql)
{
	global $host;
	global $user;
	global $password;
	global $database;

	$con = mysqli_connect($host,$user,$password,$database);
	
	if($con->connect_errno > 0) {die('Unable to connect to database [' . $con->connect_error . ']');}
	
	$result = mysqli_query($con,$sql);
	if(!$result) { return null; }
	else
	{
		if(mysqli_num_rows($result) == 0) 
		{
		return null;
		}
		else
		{
		return $result;
		$result->free();
		}
	mysqli_close($con);
	}
}

function sql_update($sql)
{
	global $host;
	global $user;
	global $password;
	global $database;

	$con = mysqli_connect($host,$user,$password,$database);
	
	if($con->connect_errno > 0) {die('Unable to connect to database [' . $con->connect_error . ']');}
	
	if (!mysqli_query($con,$sql)) {	die('Error: ' . mysqli_error($con)); } else { return true; }
	
	mysqli_close($con);
}

###########################################################################################################################

############################################## Misc Functions #############################################################

function check_tag_exists($tag)
{
	$sql = 'SELECT * from tags where tag_name = "'.$tag.'"';
	$result = sql_select($sql);
	if(mysqli_num_rows($result))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function social_links()
{
	global $facebook_link;
	global $twitter_link;
	global $instagram_link;
	global $tumblr_link;
	
	if($facebook_link != '') { echo '<a href="'.$facebook_link.'" target="_new"><img src="img/fb.png"></a>'; }
	if($twitter_link != '') { echo '<a href="'.$twitter_link.'" target="_new"><img src="img/twitter.png"></a>'; }
	if($instagram_link != '') { echo '<a href="'.$instagram_link.'" target="_new"><img src="img/instagram.png"></a>'; }
	if($tumblr_link != '') { echo '<a href="'.$tumblr_link.'" target="_new"><img src="img/tumblr.png"></a>'; }
}

function display_footer()
{

	echo 'SimpleCMS v0.5 | Copyright Chris Andrews';
	
	if(isset($website_title)) { echo ' | '.$website_title; }
	
	if(logged_in() == 'admin' ) { echo ' | <a href="admin.php">Admin Sub-Menu<a>'; } 
	
	if(logged_in()) { echo ' | <a href="edit_user.php">Edit your Profile<a> | <a href="logout.php?refresh=5">Log Out</a>'; } 
	else { echo ' | <a href="login.php">Log In</a>'; }
	
}

###########################################################################################################################

?>