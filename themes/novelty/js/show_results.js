// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
	var array = ['','Sebring','COTA powered by JRT','Motegi','Nürburgring powered by The DRE','Spa-Francorchamps powered by Sim-Lab','Le Mans powered by Racespot'];
	console.log(array);
//	var val = 1;
//	jQuery('#circuit').html('6 hours of '+ array[1]);
	jQuery('#select_race').change(function(){
		console.log("check");
		val = jQuery(this).val();
	
		//Change the title of the page
		var int = parseInt(val);
		if(int == 6){
			jQuery('#circuit').html('24 Hours of '+ array[int]);
		}
		else{
			jQuery('#circuit').html('6 Hours of '+ array[int]);
		}
		
		//load the right JSON file
		var url = 'http://www.neo-endurance.com/php/show_S3resultsR'+val+'.php';
		jQuery.getJSON(url,function(data){
		console.log('open json file');	
			
			//empty table before loading the new data
			jQuery('.rows').empty();
			console.log('empty table');
			
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
						'<td VALIGN="top">' +  data.Laps_Led + '</td>' + 
						'<td VALIGN="top">' +  data.avg_lap + '</td>' +
						'<td VALIGN="top">' +  data.fastest_lap + '</td>' +
						'<td VALIGN="top">' +  data.fastest_lap_num + '</td>' +
						'<td VALIGN="top">' +  data.Out + '</td>' +
						'</tr>'
					);
				}
			});
		});
	}).change();
});