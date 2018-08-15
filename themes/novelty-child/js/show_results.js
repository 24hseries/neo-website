// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
	var events = {
		'season1': [],
		'season2': [],
		'season3': [],
		'season4': []
	};
	var season2 = [];
	var array = ['','Sebring','Road America','Motegi','Nürburgring','Spa-Francorchamps','Le Mans powered by Racespot'];
    
	jQuery('#select_race').change(function(){
		console.log("check");
		var season = jQuery('#select_season').val();
		val = jQuery(this).val();
	
		//Change the title of the page
		var int = parseInt(val);
		jQuery('#circuit').html('24 Hours of ' + array[int]);
		
		//load the right JSON file
		var url = 'https://www.neo-endurance.com/php/nes' + season + '_results_race' + val + '.php';
		jQuery.getJSON(url,function(data){
			
			//empty table before loading the new data
			jQuery('.rows').empty();
			
			//load the new data
			jQuery.each(data, function(index, data){
				if(data.Cust_ID < 0){
					jQuery('#results').append(
						'<tr class="rows">'+
						'<td VALIGN="top">' +  data.Pos + '</td>' +
						'<td VALIGN="top"><span class="result'+data.Class+'">' +  data.Class_Pos + '</span></td>' +
						'<td VALIGN="top"><span class="result'+data.Class+'">' +  data.Class + '</span></td>' +
						'<td VALIGN="top">' +  data.Name + '</td>' + 
						'<td VALIGN="top">' +  data.car_num + '</td>' + 
						'<td VALIGN="top">' +  data.laps_comp + '</td>' + 
						'<td VALIGN="top">' +  data.Interval + '</td>' +
						'<td VALIGN="top">' +  data.avg_lap + '</td>' +
						'<td VALIGN="top">' +  data.fastest_lap + '</td>' +
						'<td VALIGN="top">' +  data.Out + '</td>' +
						'</tr>'
					);
				}
			});
		});
	}).change();
});