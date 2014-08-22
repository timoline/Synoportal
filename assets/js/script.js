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
	
	//Go to Specific Tab on Page Reload
		var hash = location.hash
	  , hashPieces = hash.split('?')
	  , activeTab = $('[href=' + hashPieces[0] + ']');
	activeTab && activeTab.tab('show');	
	
	
	
	$(document).ready(function(){
		$('#dt_intralinks').dataTable({
		"bStateSave": true,
        "sDom": '<<"dt_floatleft"f><"dt_floatright"p>rt<"dt_floatleft"i>>',
		"oLanguage": { "sSearch": "" }
		});
		
		$('.dataTables_filter input').attr("placeholder", "Search");
	});
	
	$(document).ready(function(){
		$('#dt_favorites').dataTable({
		"bStateSave": true,
        "sDom": '<<"dt_floatleft"f><"dt_floatright"p>rt<"dt_floatleft"i>>',
		"oLanguage": { "sSearch": "" }
		});
		
		$('.dataTables_filter input').attr("placeholder", "Search");
	});	
	
	$(document).ready(function(){
		$('#dt_meterstanden').dataTable({
		"bStateSave": true,
        "sDom": '<<"dt_floatleft"f><"dt_floatright"p>rt<"dt_floatleft"i>>',
		"oLanguage": { "sSearch": "" }
		});
		
		$('.dataTables_filter input').attr("placeholder", "Search");
	});	
	
	$(document).ready(function(){
		$('#dt_adressen').dataTable({
		"bStateSave": true,
        "sDom": '<<"dt_floatleft"f><"dt_floatright"p>rt<"dt_floatleft"i>>',
		"oLanguage": { "sSearch": "" }
		});
		
		$('.dataTables_filter input').attr("placeholder", "Search");
	});		
	
	$(document).ready(function(){
		$('#dt_zon').dataTable({
		"bStateSave": true,
        "sDom": '<<"dt_floatleft"f><"dt_floatright"p>rt<"dt_floatleft"i>>',
		"filter":   false
		});
	});		
		
});