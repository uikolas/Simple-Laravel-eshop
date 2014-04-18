<?php echo View::make('admin.header'); ?>
		<div class="row">
			<div class="col-lg-12">
				<h1>Prekės redagavimas <span class="label label-default"><a href="<?php echo url(); ?>/admin/prekes">Atgal</a></span></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo url(); ?>/admin">Pagrindinis</a></li>
					<li><a href="<?php echo url(); ?>/admin/prekes">Prekės</a></li>
					<li class="active">Prekės redagavimas</li>
				</ol>
				<?php if($errors->any()) { ?>
				<div class="alert alert-danger">
				<?php foreach($errors->all() as $message ){ ?>
					<div><?php echo $message; ?></div>
				<?php } ?>
				</div>
				<?php } ?>
				<?php echo Form::model($preke, array('route' => array('admin.prekes.update', $preke->id), 'method' => 'PUT')); ?>
					<div class="form-group">
						<label>Prekės pavadinimas</label>
						<input type="text" name="pavadinimas" id="pavadinimas" class="form-control" value="<?php echo $preke->pavadinimas; ?>" />
					</div>
					<div class="form-group">
						<label>Prekės slug</label>
						<input type="text" name="slug" id="slug" class="form-control" value="<?php echo $preke->slug; ?>" />
					</div>
					<div class="form-group">
						<label>Prekės aprašymas</label>
						<textarea name="aprasymas" class="form-control" rows="3"><?php echo $preke->aprasymas; ?></textarea>
					</div>
					<div class="form-group">
						<label>Prekės kaina</label>
						<div class="input-group">
							<input type="text" name="kaina" class="form-control" value="<?php echo $preke->kaina; ?>" />
							<span class="input-group-addon">lt</span>
						</div>						
					</div>
					<div class="form-group">
						<label>Prekės foto</label>
						<input type="text" name="foto" class="form-control" value="<?php echo $preke->foto; ?>" />
					</div>			
					<div class="form-group">
						<label>Prekės kategorija</label>
						<select name="kategorija" class="form-control">
						<?php foreach($kategorijos as $kategorija){ ?>
							<option value="<?php echo $kategorija->id; ?>" <?php echo ($kategorija->id == $preke->kategorija->id ? 'selected="selected"' : ''); ?>><?php echo $kategorija->pavadinimas; ?></option>
						<?php } ?>
						</select>
					</div>	
					<div class="form-group">
						<label>Prekės kiekis</label>
						<?php echo Form::selectRange('kiekis', 1, 100, $preke->kiekis, array('class'=>'form-control')); ?>
					</div>					
					<input type="submit" value="Išsaugoti" class="btn btn-primary" />
				</form>

			</div>
		</div>
<?php echo View::make('admin.footer'); ?>