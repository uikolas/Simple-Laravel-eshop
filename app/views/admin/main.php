<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Admin pagrindinis puslapis </h1>
				<ol class="breadcrumb">
					<li class="active">Pagrindinis</li>
				</ol>

				<div class="alert alert-warning">
					<strong>Dėl saugumo sumetimu išimtas prekių, kategorijų redagavimas, kūrimas, trinimas per duomenų bazę.</strong>
				</div>

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="info-blokas centre">
							<h2><?php echo $items; ?></h2>
							Prekių
						</div>
						<div class="info-blokas centre">
							<h2><?php echo $categories; ?></h2>
							Kategorijų
						</div>	
						<div class="info-blokas centre">
							<h2><?php echo $orders; ?></h2>
							Naujų užsakymų
						</div>						
					</div>
				</div>

				<div class="centre">
					<a class="btn btn-primary btn-lg" href="<?php echo url(); ?>/admin/prekes/create" role="button">Pridėti prekę</a>
					<a class="btn btn-primary btn-lg" href="<?php echo url(); ?>/admin/kategorijos/create" role="button">Pridėti kategoriją</a>
				</div>

			</div>
		</div>
<?php echo View::make('admin.footer'); ?>