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
	
	//toggle leftmenu
	var collapsed = false;
	$('#showMenu').click(function() {
		if(!collapsed){
			$('#leftmenu').hide();
			$('#maincontent').removeClass();
		} else {
			$('#maincontent').addClass("col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main");
			$('#leftmenu').show();
		}
		collapsed = !collapsed;
	});		
});