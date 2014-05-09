<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Prekės <span class="label label-default"><a href="<?php echo url(); ?>/admin/prekes/create">Pridėti naują prekę</a></span></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li class="active">Prekės</li>
				</ol>
				<?php if(Session::has('message')) { ?>
					<div class="alert alert-info"><?php echo Session::get('message'); ?></div>
				<?php } ?>
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th class="id centre">ID</th>
						<th>Pavadinimas</th>
						<th>Aprašymas</th>
						<th>Kaina</th>
						<th>Kategorija</th>
						<th>Slug</th>
						<th class="veiksmai"></th>
					<tr>
					<?php foreach($prekes as $preke){ ?>
					<tr>
						<td class="centre"><?php echo $preke->id; ?></td>
						<td><a href=""><?php echo $preke->pavadinimas; ?></a></td>
						<td><?php echo str_limit($preke->aprasymas, 40); ?></td>
						<td><?php echo $preke->kaina; ?> lt</td>
						<td><?php echo $preke->kategorija->pavadinimas; ?></td>
						<td><?php echo str_limit($preke->slug, 40); ?></td>
						<td>
							<a href="<?php echo url(); ?>/admin/preke/<?php echo $preke->id; ?>/edit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Redaguoti</a>
							<?php echo Form::open(array('method' => 'DELETE', 'route' => array('admin.kategorijos.destroy', $preke->id), 'class' => 'pull-right')); ?>
							<?php echo Form::submit('Ištrinti', array('class' => 'btn btn-danger')); ?>
							<?php echo Form::close(); ?>
						</td>
					</tr>
					<?php } ?>
				</table>
				<div class="centere">
				<?php echo $prekes->links(); ?>
				</div>
		
			</div>
		</div><!-- /.row -->
<?php echo View::make('admin.footer'); ?>