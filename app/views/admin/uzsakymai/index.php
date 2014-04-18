<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Užsakymai</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li class="active">Užsakymai</li>
				</ol>
				<?php if(Session::has('message')) { ?>
					<div class="alert alert-info"><?php echo Session::get('message'); ?></div>
				<?php } ?>
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>ID</th>
						<th>Užsakovas</th>
						<th>El. Paštas</th>
						<th>Telefonas</th>
						<th>Miestas</th>
						<th>Adresas</th>
						<th>Apmokėjimas</th>
						<th>Būsena</th>
					<tr>
					<?php foreach($uzsakymai as $uzsakymas){ ?>
					<tr>
						<td><a href="<?php echo url(); ?>/admin/uzsakymai/<?php echo $uzsakymas->uzsakymo_nr; ?>"><?php echo $uzsakymas->uzsakymo_nr; ?></a></td>
						<td><?php echo $uzsakymas->vardas; ?> <?php echo $uzsakymas->pavarde; ?></td>
						<td><?php echo $uzsakymas->email; ?></td>
						<td><?php echo $uzsakymas->telefonas; ?></td>
						<td><?php echo $uzsakymas->miestas; ?></td>
						<td><?php echo $uzsakymas->adresas; ?></td>
						<td><?php echo ($uzsakymas->atsiimti == 1) ? 'Banku' : 'Atsiimant'; ?></td>
						<td><?php echo ($uzsakymas->apmoketa == 1) ? '<span class="label label-success">Apmokėta</span>' : '<span class="label label-danger">Neapmokėta</span>'; ?></td>
					</tr>
					<?php } ?>
				</table>
				<div class="centere">
				<?php echo $uzsakymai->links(); ?>
				</div>
			</div>
		</div>
<?php echo View::make('admin.footer'); ?>