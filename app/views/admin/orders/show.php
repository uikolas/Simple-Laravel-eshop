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
					Užsakymo numeris: <strong><?php echo $order->uzsakymo_nr; ?></strong><br />
					<?php echo $order->vardas; ?><br />
					<?php echo $order->pavarde; ?><br />
					<?php echo $order->email; ?><br />
					<?php echo $order->telefonas; ?><br />
					<?php echo $order->miestas; ?><br />
					<?php echo $order->adresas; ?><br />
					Apmokėjimas: <?php echo ($order->atsiimti == 1) ? 'Bankiniu pavedimu' : 'Atsiimant prekę'; ?><br />
					Apmokejimo statusas: <?php echo ($order->apmoketa == 1) ? '<span class="label label-success">Apmokėta</span>' : '<span class="label label-danger">Neapmokėta</span>'; ?><br />
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
						<?php foreach($order_items as $item) { ?>
						<tr>
							<td class="id"><?php echo $item->preke_id; ?></td>
							<td><a href="<?php echo url(); ?>/preke/<?php echo $item->item->slug; ?>"><?php echo $item->item->pavadinimas; ?></a></td>
							<td><?php echo $item->item->kaina; ?> lt</td>
							<td>
								<?php echo $item->kiekis; ?>
							</td>
							<td>
								<?php echo $item->item->kaina * $item->kiekis; ?>
							</td>
						</tr>	
						<?php } ?>
						<tr>
							<td colspan="4"></td>
							<td><strong><?php echo $order->suma; ?></strong> lt</td>
						</tr>
					</table>
				</address>
			</div>
		</div>
<?php echo View::make('admin.footer'); ?>