<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $pagetitle; ?></title>
		<link rel="stylesheet" href="<?= URL ?>public/css/normalize.css" />
		<link rel="stylesheet" href="<?= URL ?>public/css/app.css" />
		<link rel="stylesheet" href="<?= URL ?>public/css/fonts/social.css" />
		<script src="<?= URL ?>public/js/modernizr.js"></script>
	</head>
	<body>
		<div class="contain-to-grid sticky">
			<nav class="top-bar" data-topbar data-options="scrolltop : false">
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?= URL ?>">MsgBrd</a></h1>
					</li>
					<li class="toggle-topbar"><a href="#" style="font-size: 24px;">&#9776;</a></li>
				</ul>
			
				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="left">
						<? if ($login->isUserLoggedIn() == true) : ?>
						<li><a href="<?= URL ?>">Home</a></li>
						<li><a href="<?= URL ?>discussions/">All Discussions</a></li>
						<li class="show-for-small-only"><a href="<?= URL ?>discussions/bugs/">View Bugs</a></li>
						<li class="show-for-small-only"><a href="<?= URL ?>discussions/features/">View Features</a></li>
						<li class="show-for-small-only"><a href="<?= URL ?>discussions/questions/">View Questions</a></li>
						<li class="show-for-small-only"><a href="<?= URL ?>discussions/announcements/">View Announcements</a></li>
						<li class="show-for-small-only"><a href="<?= URL ?>edit/">Edit Profile</a></li>
						<li><a href="<?= URL ?>?logout">Log Out</a></li>
						<? else : ?>
						<li><a href="<?= URL ?>password_reset/">Forgot Password</a></li>
						<? endif; ?>
					</ul>
				</section>
			</nav>
		</div>
		<div class="row">
		<?
		// show potential errors / feedback (from login object)
		if (isset($login)) {
		    if ($login->errors) {
		        foreach ($login->errors as $error) {
		            echo '<div data-alert class="alert-box warning">'; echo $error; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		    if ($login->messages) {
		        foreach ($login->messages as $message) {
		            echo '<div data-alert class="alert-box success">'; echo $message; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		}

		// show potential errors / feedback (from registration object)
		if (isset($registration)) {
		    if ($registration->errors) {
		        foreach ($registration->errors as $error) {
		            echo '<div data-alert class="alert-box warning">'; echo $error; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		    if ($registration->messages) {
		        foreach ($registration->messages as $message) {
		            echo '<div data-alert class="alert-box success">'; echo $message; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		}
		
		// show potential errors / feedback (from create object)
		if (isset($create)) {
		    if ($create->errors) {
		        foreach ($create->errors as $error) {
		            echo '<div data-alert class="alert-box warning">'; echo $error; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		    if ($create->messages) {
		        foreach ($create->messages as $message) {
		            echo '<div data-alert class="alert-box success">'; echo $message; echo '<a href="#" class="close">&times;</a></div>';
		        }
		    }
		}
		?>
		</div>
		<div class="container">