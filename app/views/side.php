<div class="col-md-3">
	<div class=""><!--data-spy="affix"-->
		<div class="side">
			<h3>Krepšelis</h3>
			<div class="panel panel-default">
				<div class="panel-body center-text">
					<div class="krepselis">
						<?php if(Session::has('cart') && $krepselis['kiekis'] > 0){ ?>
						Prekės: <strong><?php echo $krepselis['kiekis']; ?></strong> už <strong><?php echo $krepselis['suma']; ?></strong> lt
						<?php } else { ?>
						Krepšelis tuščias
						<?php } ?>
					</div>
					<hr />
					<a href="<?php echo url(); ?>/krepselis" class="btn btn-primary">Užsakyti</a>
				</div>
			</div>						
		</div>				
		<div class="side">
			<h3>Kategorijos</h3>
			<div class="list-group">
				<?php foreach($kategorijos as $kategorija){ ?>
				<a href="<?php echo url().'/kategorija/'.$kategorija->slug; ?>" class="list-group-item"><?php echo $kategorija->pavadinimas; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>