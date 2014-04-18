<?php echo View::make('header'); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Patvirtinimas ir apmokėjimas</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail">
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 1</h4>
						<p class="list-group-item-text">Prekių kiekis</p>
					</a></li>
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 2</h4>
						<p class="list-group-item-text">Kontaktinė informacija</p>
					</a></li>
					<li class="active"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 3</h4>
						<p class="list-group-item-text">Patvirtinimas</p>
					</a></li>
				</ul>
			</div>
		</div>			
		<form action="" method="post">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="row">
				<div class="col-xs-12">
					<address>
						<strong>Kontaktine informacija:</strong><br />
						Užsakymo numeris: <strong><?php echo $uzsakymas->uzsakymo_nr; ?></strong><br />
						<?php echo $uzsakymas->vardas; ?><br />
						<?php echo $uzsakymas->pavarde; ?><br />
						<?php echo $uzsakymas->email; ?><br />
						<?php echo $uzsakymas->telefonas; ?><br />
						<?php echo $uzsakymas->miestas; ?><br />
						<?php echo $uzsakymas->adresas; ?><br />
						Apmokėjimas: <?php echo ($uzsakymas->atsiimti == 1) ? 'Bankiniu pavedimu' : 'Atsiimant prekę'; ?><br />
					</address>		
					
					<h4><a href="<?php echo url(); ?>/uzsakymas/<?php echo $uzsakymas->uzsakymo_nr; ?>">Prekės užsakymo informacija galite matyti čia</a></h4>
					
					<div class="center-text">
						<button class="btn btn-primary btn-lg" type="submit">Patvirtinti ir apmokėti užsakymą</button>
					</div>
				</div>
			</div>
		</form>		
	</div>
</div> 
<?php echo View::make('footer'); ?>