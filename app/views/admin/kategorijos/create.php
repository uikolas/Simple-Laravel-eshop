<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Kategorijos kūrimas <span class="label label-default"><a href="<?php echo url(); ?>/admin/kategorijos">Atgal</a></span></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li><a href="<?php echo url(); ?>/admin/kategorijos">Kategorijos</a></li>
					<li class="active">Kategorijos kūrimas</li>
				</ol>
				<?php if($errors->any()) { ?>
				<div class="alert alert-danger">
				<?php foreach($errors->all() as $message ){ ?>
					<div><?php echo $message; ?></div>
				<?php } ?>
				</div>
				<?php } ?>
				<?php echo Form::open(array('route' => 'admin.kategorijos.store')); ?>
					<div class="form-group">
						<label>Kategorijos pavadinimas</label>
						<input type="text" name="pavadinimas" id="pavadinimas" class="form-control" />
					</div>
					<div class="form-group">
						<label>Kategorijos slug</label>
						<input type="text" name="slug" id="slug" class="form-control" />
					</div>					
					<input type="submit" value="Išsaugoti" class="btn btn-primary" />
				</form>
				
			</div>
		</div>
<?php echo View::make('admin.footer'); ?>