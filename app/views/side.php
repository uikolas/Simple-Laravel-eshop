			
			<div class="col-md-3">
				<div  class=""><!--data-spy="affix"-->
					<div class="side">
						<h3>Krepšelis</h3>
						<div class="panel panel-default">
							<div class="panel-body center-text">
								<div class="krepselis">
									<?php //print_r($krepselis[0]); ?>
									<?php if(isset($krepselis[0])){?>
									Prekės: <strong><?php echo $krepselis_kiekis; ?></strong> uz <strong><?php echo $krepselis_suma; ?> lt</strong>
									<?php } else {?>
									Tuščias
									<?php } ?>
								</div>
								<hr />
								<a href="<?php echo url(); ?>/krepselis">Užsakyti</a>
							</div>
							<?php //echo($prekes_krepselyje);?>
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