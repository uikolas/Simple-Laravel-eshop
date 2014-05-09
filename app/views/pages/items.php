<?php echo View::make('header'); ?>
<div class="row">
	<?php echo View::make('side'); ?>
	<div class="col-md-9">
		<div class="row">
			<?php foreach($items as $item){ ?>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail clearfix prekes">
					<img src="<?php echo $item->foto; ?>" alt="">
					<div class="caption">
						<div class="pull-left pav"><h4><a href="<?php echo url(); ?>/preke/<?php echo $item->slug; ?>"><?php echo $item->pavadinimas; ?></a></h4></div>
						<div class="pull-right"><h4><?php echo $item->kaina; ?> lt</h4></div>
					</div>
					<div class="info clearfix">
						<div class="pull-left cat"><a href="<?php echo url(); ?>/kategorija/<?php echo $item->category->slug; ?>"><?php echo $item->category->pavadinimas; ?></a></div>
						<div class="pull-right cart">
							<?php if(in_array($item->id, $cart['items'])){ ?>
							<span class="label label-default">Pridėta</span>
							<?php } else { ?>
							<span class="label label-primary cursor prideti" data-preke="<?php echo $item->id; ?>">Pridėti į krepšelį</span>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>	
			<?php } ?>
		</div>
		<div class="center-text">
		<?php echo $items->links(); ?>
		</div>
	</div>
</div>
<?php echo View::make('footer'); ?>