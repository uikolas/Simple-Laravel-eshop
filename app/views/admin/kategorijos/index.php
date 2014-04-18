<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Kategorijos <span class="label label-default"><a href="<?php echo url(); ?>/admin/kategorijos/create">Pridėti naują kategoriją</a></span></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li class="active">Kategorijos</li>
				</ol>
				<?php if(Session::has('message')) { ?>
					<div class="alert alert-info"><?php echo Session::get('message'); ?></div>
				<?php } ?>
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th class="id centre">ID</th>
						<th>Pavadinimas</th>
						<th>Slug</th>
						<th class="veiksmai"></th>
					<tr>
					<?php foreach($kategorijos as $kategorija){ ?>
					<tr>
						<td class="centre"><?php echo $kategorija->id; ?></td>
						<td><?php echo $kategorija->pavadinimas; ?></td>
						<td><?php echo $kategorija->slug; ?></td>
						<td>
							<a href="<?php echo url(); ?>/admin/kategorijos/<?php echo $kategorija->id; ?>/edit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Redaguoti</a>
							<?php echo Form::open(array('method' => 'DELETE', 'route' => array('admin.kategorijos.destroy', $kategorija->id), 'class' => 'pull-right')); ?>
							<?php echo Form::submit('Ištrinti', array('class' => 'btn btn-danger')); ?>
							<?php echo Form::close(); ?>
						</td>
					</tr>
					<?php } ?>
				</table>

			</div>
		</div>
<?php echo View::make('admin.footer'); ?>