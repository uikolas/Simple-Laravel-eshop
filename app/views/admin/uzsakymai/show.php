<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Užsakymas <span class="label label-default"><a href="<?php echo url(); ?>/admin/uzsakymai">Atgal</a></span></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li><a href="<?php echo url(); ?>/admin/uzsakymai">Užsakymai</a></li>
					<li class="active">Užsakymas</li>
				</ol>

				<address>
					<strong>Kontaktine informacija:</strong><br />
					Užsakymo numeris: <strong><?php echo $uzsakymas->uzsakymo_nr; ?></strong><br />
					<?php echo $uzsakymas->vardas; ?><br />
					<?php echo $uzsakymas->pavarde; ?><br />
					<?php echo $uzsakymas->email; ?><br />
					<?php echo $uzsakymas->telefonas; ?><br />
					<?php echo $uzsakymas->miestas; ?><br />
					<?php echo $uzsakymas->adresas; ?><br />
					Apmokėjimas: <?php echo ($uzsakymas->atsiimti == 1) ? 'Bankiniu pavedimu' : 'Atsiimant prekę'; ?><br />
					Apmokejimo statusas: <?php echo ($uzsakymas->apmoketa == 1) ? '<span class="label label-success">Apmokėta</span>' : '<span class="label label-danger">Neapmokėta</span>'; ?><br />
				</address>
				<address>
					<strong>Užsakytos prekės:</strong><br />
					<table class="table table-hover">
						<tr>
							<th class="id">ID</th>
							<th class="preke">Prekė</th>
							<th>Kaina</th>
							<th>Kiekis</th>
							<th>Iš viso</th>
						</tr>
						<?php foreach($krepselio_prekes as $preke) { ?>
						<tr>
							<td class="id"><?php echo $preke->preke_id; ?></td>
							<td><a href="<?php echo url(); ?>/preke/<?php echo $preke->preke->slug; ?>"><?php echo $preke->preke->pavadinimas; ?></a></td>
							<td><?php echo $preke->preke->kaina; ?> lt</td>
							<td>
								<?php echo $preke->kiekis; ?>
							</td>
							<td>
								<?php echo $preke->preke->kaina * $preke->kiekis; ?>
							</td>
						</tr>	
						<?php } ?>
						<tr>
							<td colspan="4"></td>
							<td><strong><?php echo $uzsakymas->suma; ?></strong> lt</td>
						</tr>
					</table>
				</address>
			</div>
		</div>
<?php echo View::make('admin.footer'); ?>