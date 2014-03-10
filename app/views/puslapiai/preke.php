<?php echo $header; ?>

<div class="row">
	<?php echo $side; ?>
	<div class="col-md-9">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><a href="<?php echo url(); ?>/kategorija/<?php echo $preke->kategorija->slug; ?>"><?php echo $preke->kategorija->pavadinimas; ?></a> / <?php echo $preke->pavadinimas; ?></h3>
					</div>
					<div class="panel-body">
						<div class="image"><img src="<?php echo $preke->foto; ?>" alt=""></div>
						<div><h4>Kodas: <?php echo $preke->id; ?></h4></div>
						<div><h3>Kaina: <?php echo $preke->kaina; ?> lt</h3></div>
						<div>
							<h3>
								<?php if(in_array($preke->id, $prekes_krepselyje)){ ?>
								<span class="label label-default">Pridėta</span>
								<?php } else { ?>
								<span class="label label-primary cursor prideti" data-preke="<?php echo $preke->id; ?>">Pridėti į krepšelį</span>
								<?php } ?>
							</h3>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Aprasymas</h3>
					</div>
					<div class="panel-body">
						<?php echo $preke->aprasymas; ?>
					</div>
				</div>		
	
	</div>
</div>

<?php echo $footer; ?>