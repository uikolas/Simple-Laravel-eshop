<?php echo View::make('header'); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Užsakymas</h3>
	</div>
	<div class="panel-body">
		<?php if($krepselis['kiekis'] != 0){ ?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail">
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 1</h4>
						<p class="list-group-item-text">Prekių kiekis</p>
					</a></li>
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 2</h4>
						<p class="list-group-item-text">Kontaktinė informacija</p>
					</a></li>
					<li class="active"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 3</h4>
						<p class="list-group-item-text">Patvirtinimas</p>
					</a></li>
				</ul>
			</div>
		</div>			
		<form>
			<div class="row">
				<div class="center-text">
					<button class="btn btn-primary btn-lg" type="submit">Patvirtinti užsakymą</button>
				</div>
			</div>
		</form>		
		<?php } else { ?>
			<div class="alert alert-danger">Krepšelis tuščias</div>
		<?php } ?>
	</div>
</div> 

<?php echo View::make('footer'); ?>