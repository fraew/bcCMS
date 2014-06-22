<?php bootstrap(); ?>
<?php website_settings(); ?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
	
	<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
	<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
	
	<?php echo '<title>'.$website_title.'</title>'; ?>

    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
	
	</head>
<body>
    <div class="nav">
      <div class="container-fluid">
        <ul class="navbar-left nav nav-pills">
			<li><a href="index.php"><?php echo $website_title; ?></a></li> 
			<?php display_cats(0, 1, 'menu', 0); ?>
			<?php display_navbar(); ?>
		</ul>
        <ul class="navbar-right nav nav-pills">
		   <?php social_links(); ?>
       </ul>
      </div>
    </div>
	
	<div class="jumbotron">
      <div class="container-fluid">
		<h1><?php echo $website_title; ?></h1>
	  	<div class="row">
		  <div class="col-md-3">
            <?php if($website_subtitle != '') { echo '<p>'.$website_subtitle.'</p>'; } ?>
		  </div>
		  <div class="col-md-9">
            <?php 
			if(($_GET['tag']) != '') 
			{ 
				echo '<h3 class="white">Posts with the Tag: '.($_GET['tag']).'</h3>'; 
			} 
			if(($_GET['cat']) != '')
			{ 
				$cat_id = $_GET['cat'];
				$result = sql_select("select a.cat_name, b.cat_name as parent_cat_name from cats a join cats b on a.parent_cat_id = b.cat_id where a.cat_id = ".$cat_id);
				if($result != '')
				{
					while ($row = mysqli_fetch_assoc($result)) 
					{
					$cat_name = $row['cat_name'];
					$parent_cat_name = $row['parent_cat_name'];
					echo '<h3 class="white">'.$parent_cat_name.': '.$cat_name.'</h3>'; 
					}
				}
			} 
			?>
		  </div>
		</div>
	  </div>
	</div>