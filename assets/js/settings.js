$(document).ready(function() {

	// Dialogs (alerts)
	$('#closeDialog').click(function(){
		$('#overlay').hide();
		$('#dialog').removeClass();
		$('#dialog').addClass('default');
	});
	
	
	$('#saveSettings').click(function(){
		$.ajax({
			url: 'ajax.php?a=saveSettings',
			type: 'POST',
			dataType: 'json',
			data: $('#containerSettings form').serialize(),
			success: function( data ) {
															
				$('#messageLabel').text(data["msglabel"]);
				$('#message').text(data["msg"]);
				$('#settingsModal').modal('show');	
						
			}
		});			
		return false;
	});	
	
	//Go to Specific Tab on Page Reload
		var hash = location.hash
	  , hashPieces = hash.split('?')
	  , activeTab = $('[href=' + hashPieces[0] + ']');
	activeTab && activeTab.tab('show');		
});