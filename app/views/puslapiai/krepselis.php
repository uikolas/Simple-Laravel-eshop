<?php echo View::make('header'); ?>

<div class="alert alert-warning alert-dismissable">
	<strong>Dėmesio!</strong> Tai yra tikai DEMO svetainė, prekės šiame tinklapyje neįmanoma užsisakyti
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Krepšelis</h3>
	</div>
	<div class="panel-body">
		<?php if($krepselis['kiekis'] != 0){ ?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail">
					<li class="active"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 1</h4>
						<p class="list-group-item-text">Prekių kiekis</p>
					</a></li>
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 2</h4>
						<p class="list-group-item-text">Kontaktinė informacija</p>
					</a></li>
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 3</h4>
						<p class="list-group-item-text">Patvirtinimas</p>
					</a></li>
				</ul>
			</div>
		</div>		
		<table class="table table-hover">
			<tr>
				<th class="id">ID</th>
				<th class="preke">Prekė</th>
				<th>Kaina</th>
				<th>Kiekis</th>
				<th>Iš viso</th>
			</tr>
			<?php foreach($uzsakymas as $preke) {?>
			<tr>
				<td class="id"><?php echo $preke->preke_id; ?></td>
				<td><?php echo $preke->preke->pavadinimas; ?></td>
				<td><span class="kaina"><?php echo $preke->preke->kaina; ?></span> lt</td>
				<td>
					<input type="text" class="input-sm inputas" value="<?php echo $preke->kiekis; ?>" /> 
					<span class="cursor update"><img src="<?php echo url(); ?>/public/images/update.png" /></span>
				</td>
				<td>
					<span class="is_viso"><?php echo $preke->preke->kaina; ?></span> lt 
					<span class="cursor delete"><img src="<?php echo url(); ?>/public/images/cross.png" /></span>
				</td>
			</tr>	
			<?php } ?>
			<tr>
				<td colspan="4"></td>
				<td><span class="galutine"><?php echo $krepselis['suma']; ?></span> lt</td>
			</tr>
		</table>
		<hr />
		<!--<div class="pull-right"><button type="button" class="btn btn-default">Užsakyti</button></div>-->
		<div class="pull-right"><a href="<?php echo url(); ?>/uzsakymas" class="btn btn-default">Tęsti</a></div>
		<?php } else { ?>
			<div class="alert alert-danger">Krepšelis tuščias</div>
		<?php } ?>
	</div>
</div> 

<?php echo View::make('footer'); ?>