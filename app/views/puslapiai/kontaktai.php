<?php echo View::make('header'); ?>

<div class="row">
	<?php echo View::make('side'); ?>
	<div class="col-md-9">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Kontaktai</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="row">
								<div class="col-xs-6 col-md-6 form-group">
									<input class="form-control" id="name" name="name" placeholder="Vardas" type="text" required autofocus />
								</div>
								<div class="col-xs-6 col-md-6 form-group">
									<input class="form-control" id="email" name="email" placeholder="El. paštas" type="email" required />
								</div>
							</div>
							<textarea class="form-control" id="message" name="message" placeholder="Žinutė" rows="5"></textarea>
							<br />
							<div class="col-xs-12 col-md-12 form-group">
								<button class="btn btn-primary pull-right" type="submit">Siųsti</button>
							</div>
						</form>
					</div>
				</div>

	</div>
</div>

<?php echo View::make('footer'); ?>