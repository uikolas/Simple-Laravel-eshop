$(function(){
	var address = document.getElementsByTagName('base')[0].href; // Svetaines adresas
	$(".inputas").numeric(); // Leidziami tik sveiki, teigiami skaiciai
	
	// Prekes pridejimas i krepseli
	$('.prideti').click(function(){
		$('.krepselis').fadeOut();
		var id = $(this).data('preke');
		$.getJSON(address + "/prideti/" + id, function(data) {
			if(data.response == 1){
				$('.krepselis').fadeIn().html('Prekės: <strong>' + data.amount + '</strong> už <strong>' + data.total + '</strong> lt');			
			}
		});
		$(this).removeClass('cursor').removeClass('prideti').removeClass('label-primary').addClass('label-default').text('Pridėta');
	});
	
	// Prekes atnaujinimas lenteleje
	var galutine = Number($('.galutine').text());
	$('.update').click(function(){
		galutine = 0;
		var id = $(this).parent().parent().find('.id').text();
		var kiekis = Number($(this).parent().find('.inputas').val()); // Kiekis (input reiksme) 
		if(kiekis <= 0 ){
			kiekis = 1;
			$(this).parent().find('.inputas').val(1);
		}		
		var kaina = $(this).parent().parent().find('.kaina').text(); // Kaina prekes
		$(this).parent().parent().find('.is_viso').text(kaina * kiekis); // Atnaujinam is viso dali
		$.get(address + "/atnaujinti/" + id + "/" + kiekis); // atnaujina prekes kieki
		$('.is_viso').each(function() {
			galutine += Number($(this).text());
		});		
		$('.galutine').text(galutine);
		galutine = 0;
	});	

	// Prekes istrinimas is krepselio
	$('.delete').click(function(){
		galutine = Number($('.galutine').text());
		$(this).parent().parent().fadeOut();	// Istrina visa tr
		var id = $(this).parent().parent().find('.id').text(); // Prekes id istrinimui
		$.get(address + "/ismesti/" + id); // Istrina preke
		galutine -= Number($(this).parent().parent().find('.is_viso').text());
		$('.galutine').text(galutine);
		if($('.galutine').text() == 0){
			$('.panel-body').empty().html('<div class="alert alert-danger">Krepšelis tuščias</div>');
		}
	});
});