<?php echo View::make('header'); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Krepšelis</h3>
	</div>
	<div class="panel-body">
		<?php if(Session::has('cart') && $cart['amount'] > 0){ ?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail">
					<li class="active"><a href="#">
						<h4 class="list-group-item-heading">Žingsnis 1</h4>
						<p class="list-group-item-text">Prekių kiekis</p>
					</a></li>
					<li class="disabled"><a href="#">
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
		<table class="table table-hover">
			<tr>
				<th class="id">ID</th>
				<th class="preke">Prekė</th>
				<th>Kaina</th>
				<th>Kiekis</th>
				<th>Iš viso</th>
			</tr>
			<?php foreach($order as $order_item) { ?>
			<tr>
				<td class="id"><?php echo $order_item['id']; ?></td>
				<td><a href="<?php echo url(); ?>/preke/<?php echo $order_item['slug'] ?>"><?php echo $order_item['name']; ?></a></td>
				<td><span class="kaina"><?php echo $order_item['price']; ?></span> lt</td>
				<td>
					<input type="text" class="input-sm inputas" value="<?php  echo $order_item['amount']; ?>" /> 
					<span class="cursor update"><img src="<?php echo url(); ?>/public/images/update.png" /></span>
				</td>
				<td>
					<span class="is_viso"><?php echo $order_item['price'] * $order_item['amount']; ?></span> lt 
					<span class="cursor delete"><img src="<?php echo url(); ?>/public/images/cross.png" /></span>
				</td>
			</tr>	
			<?php } ?>
			<tr>
				<td colspan="4"></td>
				<td><strong><span class="galutine"><?php echo $cart['total']; ?></span></strong> lt</td>
			</tr>
		</table>
		<hr />
		<div class="pull-right"><a href="<?php echo url(); ?>/kontaktine-informacija" class="btn btn-primary">Tęsti</a></div>
		<?php } else { ?>
			<div class="alert alert-danger">Krepšelis tuščias</div>
		<?php } ?>
	</div>
</div> 
<?php echo View::make('footer'); ?>