<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($title) ? $title : 'Puslapis'; ?> - Laravel eshop</title>
<base href="<?php echo url(); ?>" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo url(); ?>/public/css/style.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo url(); ?>/public/js/jquery.numeric.js" type="text/javascript"></script>
<script src="<?php echo url(); ?>/public/js/main.js" type="text/javascript"></script>
</head>
<body>

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url(); ?>"><img src="<?php echo url(); ?>/public/images/cart.png" alt="" />Laravel eshop</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo url(); ?>">Pagrindinis</a></li>
                    <li><a href="<?php echo url(); ?>/krepselis"><strong>Krepšelis</strong></a></li>
                    <li><a href="<?php echo url(); ?>/admin">Admin</a></li>
					<li><a href="https://github.com/uikolas/Simple-Laravel-eshop">GitHub</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
	
	<div class="alert alert-warning alert-dismissable">
		<strong>Dėmesio!</strong> Tai yra tiktai DEMO svetainė, prekių šiame tinklapyje užsisakyti neįmanoma
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	</div>	