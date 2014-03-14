<?php echo View::make('header'); ?>

<div class="row">
	<?php echo View::make('side'); ?>
	<div class="col-md-9">
		<div class="row">
			<?php foreach($prekes as $preke){ ?>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail clearfix">
					<img src="<?php echo $preke->foto; ?>" alt="">
					<div class="caption">
						<div class="pull-left pav"><h4><a href="<?php echo url(); ?>/preke/<?php echo $preke->slug; ?>"><?php echo $preke->pavadinimas; ?></a></h4></div>
						<div class="pull-right"><h4><?php echo $preke->kaina; ?> lt</h4></div>
					</div>
					<div class="info clearfix">
						<div class="pull-left cat"><a href="<?php echo url(); ?>/kategorija/<?php echo $preke->kategorija->slug; ?>"><?php echo $preke->kategorija->pavadinimas; ?></a></div>
						<div class="pull-right cart">
							<?php if(in_array($preke->id, $krepselis['prekes'])){ ?>
							<span class="label label-default">Pridėta</span>
							<?php } else { ?>
							<span class="label label-primary cursor prideti" data-preke="<?php echo $preke->id; ?>">Pridėti į krepšelį</span>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>	
			<?php } ?>
		</div>
		<div class="center-text">
		<?php echo $prekes->links(); ?>
		</div>
	</div>
</div>

<?php echo View::make('footer'); ?>