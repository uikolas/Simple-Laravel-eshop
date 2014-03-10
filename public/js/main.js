$(function(){
	galutine = Number($('.galutine').text());
	$('.prideti').click(function(){
		var id = $(this).data('preke');
		$.getJSON("http://adresas/prideti/" + id, function(data) {
			if(data.response == 1){
				$('.krepselis').html('Prekės: <strong>' + data.kiekis + '</strong> uz <strong>' + data.suma + ' lt</strong>');			
			}
		});
		$(this).removeClass('cursor').removeClass('prideti').removeClass('label-primary').addClass('label-default').text('Pridėta');
	});
	$('.update').click(function(){
		var kiekis = $(this).parent().find('.inputas').val(); // input reiksme 
		var kaina = $(this).parent().parent().find('.kaina').text(); // kaina
		//var is_viso = $(this).parent().parent().find('.is_viso').text(); // kiekiu kaina
		var preke = kaina * kiekis;
		$(this).parent().parent().find('.is_viso').text(preke); 
		$('.is_viso').each(function() {
			galutine += Number($(this).text());
		});		
		$('.galutine').text(galutine);
	});	
	$('.delete').click(function(){
		$(this).parent().parent().remove();	// istrina visa tr
		var id = $(this).parent().parent().find('.id').text(); // prkes id istrinimui
		//alert(id);
		$.getJSON("http://adresas/ismesti/" + id, function(data) {
			//alert();
		});		
		var is_viso = $(this).parent().parent().find('.is_viso').text();
		galutine -= Number(is_viso);
		$('.galutine').text(galutine);
		if($('.galutine').text() == 0){
			$('.panel-body').empty().html('<div class="alert alert-danger">Krepšelis tuščias</div>');
		}
	});
});