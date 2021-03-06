<?php echo View::make('header'); ?>
<div class="row">
	<?php echo View::make('side'); ?>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="<?php echo url(); ?>/kategorija/<?php echo $item->category->slug; ?>"><?php echo $item->category->pavadinimas; ?></a> / <?php echo $item->pavadinimas; ?></h3>
			</div>
			<div class="panel-body">
				<div class="image"><img src="<?php echo $item->foto; ?>" alt=""></div>
				<div><h4>Prekės kodas: <?php echo $item->id; ?></h4></div>
				<div><h4>Kiekis sandėlyje: <?php echo ($item->kiekis > 0 ? $item->kiekis : '<span class="text-danger">Nėra</span>'); ?></h4></div>
				<div><h3>Kaina: <strong><?php echo $item->kaina; ?></strong> lt</h3></div>
				<div>
					<h3>
						<?php if(in_array($item->id, $cart['items'])){ ?>
						<span class="label label-default">Pridėta</span>
						<?php } else { ?>
						<span class="label label-primary cursor prideti" data-preke="<?php echo $item->id; ?>">Pridėti į krepšelį</span>
						<?php } ?>
					</h3>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Aprašymas</h3>
			</div>
			<div class="panel-body">
				<?php echo $item->aprasymas; ?>
			</div>
		</div>		
	</div>
</div>
<?php echo View::make('footer'); ?>