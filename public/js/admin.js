$(function(){
	var address = document.getElementsByTagName('base')[0].href; // Svetaines adresas
	address += '/admin';

	setTimeout(function(){
		$('.alert-info').fadeOut();
	}, 4000);
	
	// Kuriamas slug
	$('#pavadinimas').keyup(function(){
		var slug = $('#pavadinimas').val();
		$.get(address + '/slug/' + slug, function(data) {
			$('#slug').val(data);
		});
	});
});