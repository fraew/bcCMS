<?php

session_start();

if($_GET['url']) { $url = $_GET['url']; } else { $url = 'index.php'; }
if($_GET['refresh']) { header('refresh:'.$_GET['refresh'].';url='.$url); }

website_settings();

?>

<!DOCTYPE html>
<html lang="en-US">
	<head>

<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

<script type="text/javascript">
	hs.graphicsDir = 'highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'controls-in-heading';
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.8;

	if (hs.addSlideshow) hs.addSlideshow({
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: false,
		overlayOptions: {
			opacity: 1,
			position: 'top right',
			hideOnMouseOut: false
		}
	});
</script>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<?php echo '<title>'.$website_title.'</title>'; ?>
	</head>
	<body>

<div id="header">
	<div id="social"><?php social_links(); ?></div>
	<a href="index.php"><h1><?php echo $website_title; ?></h1></a>
	<?php if($website_subtitle != '') { echo '<div class="sub-title">'.$website_subtitle.'</div>'; } ?>
</div>

<div id="container">

	<div id="colmask">
		<div id="colmid">
			<div id="colright">
				<div id="col1wrap">
					<div id="col1pad">
						<div id="col1">