$(document).ready(function() {
	$('#saveSettings').click(function(){
		$.ajax({
			url: 'ajax.php?a=saveSettings',
			type: 'POST',
			dataType: 'json',
			data: $('#container form').serialize(),
			success: function( data ) {

				
					$('#containerinput[type=password]').val('');
									

				//$('#message').text(data["msg"]);
						
			}
		});			
		return false;
	});	
});