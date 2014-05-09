<div class="col-md-3">
	<div class=""><!--data-spy="affix"-->
		<div class="side">
			<h3>Krepšelis</h3>
			<div class="panel panel-default">
				<div class="panel-body center-text">
					<div class="krepselis">
						<?php if(Session::has('cart') && $cart['amount'] > 0){ ?>
						Prekės: <strong><?php echo $cart['amount']; ?></strong> už <strong><?php echo $cart['total']; ?></strong> lt
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
				<?php foreach($categories as $categry){ ?>
				<a href="<?php echo url().'/kategorija/'.$categry->slug; ?>" class="list-group-item"><?php echo $categry->pavadinimas; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>