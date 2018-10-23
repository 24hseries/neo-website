// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
	var array = [
		'',
		'6 hours of Sebring',
		'6 hours of Circuit of the Americas',
		'6 hours of Interlagos',
		'6 hours of Suzuka',
		'6 hours of Spa-Francorchamps',
		'Racespot 24 hours of Le Mans'];
    
	jQuery('#select_race').change(function(){
		//Change the title of the page
		var val = jQuery(this).val();
		var int = parseInt(val);
		jQuery('#circuit').html(array[int]);
		
		//load the right JSON file
		// var url = 'https://www.neo-endurance.com/php/nes' + season + '_results_race' + val + '.php';
		const url = "https://neo-endurance.com/php/results/season5/race1.php";
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
						'<td VALIGN="top">' +  data.fastest_lap_num + '</td>' +
						'<td VALIGN="top">' +  data.Out + '</td>' +
						'</tr>'
					);
				}
			});
		});
	}).change();
});