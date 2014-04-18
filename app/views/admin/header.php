<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<base href="<?php echo url(); ?>" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo url(); ?>/public/css/sb-admin.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="<?php echo url(); ?>/public/js/admin.js" type="text/javascript"></script>
</head>
<body>

<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo url(); ?>/admin">Laravel eshop admin</a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a>IP: <?php echo Helper::ip(); ?></a></li>
			<li><a href="<?php echo url(); ?>">Į Puslapi</a></li>
		</ul>
		
		<!--sonine-->
		<ul class="nav navbar-nav side-nav">
			<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
			<li><a href="<?php echo url(); ?>/admin/prekes">Prekės</a></li>
			<li><a href="<?php echo url(); ?>/admin/kategorijos">Kategorijos</a></li>
			<li><a href="<?php echo url(); ?>/admin/uzsakymai">Užsakymai</a></li>
		</ul>
	</nav>

	<div id="page-wrapper">