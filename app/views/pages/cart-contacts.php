<?php echo View::make('header'); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Užsakymas</h3>
	</div>
	<div class="panel-body">
		<?php if(Session::has('cart') && $cart['amount'] > 0){ ?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail">
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 1</h4>
						<p class="list-group-item-text">Prekių kiekis</p>
					</a></li>
					<li class="active"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 2</h4>
						<p class="list-group-item-text">Kontaktinė informacija</p>
					</a></li>
					<li class="disabled"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 3</h4>
						<p class="list-group-item-text">Patvirtinimas</p>
					</a></li>
				</ul>
			</div>
		</div>	

		<?php echo Form::open(array('action' => 'CartController@postContactInformation')); ?>
			<div class="row">
				<div class="col-xs-12">
				
					<div class="alert alert-info">Visus laukus būtina užpildyti</div>
					
					<?php if($errors->any()) { ?>
					<div class="alert alert-danger">
					<?php foreach($errors->all() as $message ){ ?>
						<div><?php echo $message; ?></div>
					<?php } ?>
					</div>
					<?php } ?>						
				
					<div class="form-group">
						<label>Vardas</label>
						<input class="form-control" name="vardas" placeholder="Vardas" type="text" required autofocus />
					</div>
					<div class="form-group">
						<label>Pavardė</label>
						<input class="form-control" name="pavarde" placeholder="Pavardė" type="text" required />
					</div>					
					<div class="form-group">
						<label>El. paštas</label>
						<input class="form-control" name="email" placeholder="El. paštas" type="email" required />
					</div>
					<div class="form-group">
						<label>Telefonas</label>
						<input class="form-control" name="telefonas" placeholder="Telefonas (863000000)" type="text" required />
					</div>		
					<div class="form-group">
						<label>Miestas</label>
						<select name="miestas" class="form-control">
							<option value="Kaunas">Kaunas</option>
							<option value="Vilnius">Vilnius</option>
							<option value="Klaipėda">Klaipėda</option>
						</select>
					</div>						
					<div class="form-group">
						<label>Adresas</label>
						<input class="form-control" name="adresas" placeholder="Adresas (pvz: Kauno 10)" type="text" required />
					</div>		
					<div class="form-group">
						<label>Prekės apmokėjimas</label>
						<div class="radio">
							<label>
								<input type="radio" name="atsiimti" value="1" checked />
								Apmokėti bankiniu pavedimu
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="atsiimti" value="2" />
								Apmokėti atsiimant prekę
							</label>
						</div>						
					</div>
				</div>
				<div class="col-xs-12 col-md-12 form-group">
					<button class="btn btn-primary" onclick="history.go(-1);">Atgal</button>
					<button class="btn btn-primary pull-right" type="submit">Tęsti</button>
				</div>
			</div>
		</form>		
		<?php } else { ?>
			<div class="alert alert-danger">Krepšelis tuščias</div>
		<?php } ?>
	</div>
</div> 
<?php echo View::make('footer'); ?>