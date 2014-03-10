<?php echo $header; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Krepšelis</h3>
	</div>
	<div class="panel-body">
		<?php if(isset($uzsakymas[0])){ ?>
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
				<td><span class="galutine"><?php echo $krepselis_suma; ?></span> lt</td>
			</tr>
		</table>
		<hr />
		<div class="pull-right"><button type="button" class="btn btn-default">Užsakyti</button></div>
		<?php } else { ?>
			<div class="alert alert-danger">Krepšelis tuščias</div>
		<?php } ?>
	</div>
</div> 

<?php echo $footer; ?>