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
		<?php echo Form::open(array('action' => array('CartController@postConfirm', $order->uzsakymo_nr))); ?>
			<div class="row">
				<div class="col-xs-12">
					<address>
						<strong>Kontaktine informacija:</strong><br />
						Užsakymo numeris: <strong><?php echo $order->uzsakymo_nr; ?></strong><br />
						<?php echo $order->vardas; ?><br />
						<?php echo $order->pavarde; ?><br />
						<?php echo $order->email; ?><br />
						<?php echo $order->telefonas; ?><br />
						<?php echo $order->miestas; ?><br />
						<?php echo $order->adresas; ?><br />
						Apmokėjimas: <?php echo ($order->atsiimti == 1) ? 'Bankiniu pavedimu' : 'Atsiimant prekę'; ?><br />
					</address>		
					
					<h4><a href="<?php echo url(); ?>/uzsakymas/<?php echo $order->uzsakymo_nr; ?>">Prekės užsakymo informacija galite matyti čia</a></h4>
					
					<div class="center-text">
						<button class="btn btn-primary btn-lg" type="submit">Patvirtinti ir apmokėti užsakymą</button>
					</div>
				</div>
			</div>
		</form>		
	</div>
</div> 
<?php echo View::make('footer'); ?>