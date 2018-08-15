// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
/*	var url_Pphp = 'http://www.neo-endurance.com/php/show_standingsP.php';
	var url_gt = 'http://www.neo-endurance.com/php/show_standingsGT.php';
	var url_gtc = 'http://www.neo-endurance.com/php/show_standingsGTC.php';
	
	var url_p = 'http://www.neo-endurance.com/php/show_S2standingsP.php';
	var url_gt1 = 'http://www.neo-endurance.com/php/show_S2standingsGT1.php';
	var url_gt2 = 'http://www.neo-endurance.com/php/show_S2standingsGT2.php';
*/
	var url_p = 'http://www.neo-endurance.com/php/show_S3standingsP.php';
	var url_gt = 'http://www.neo-endurance.com/php/show_S3standingsGT.php';
	var url_gts = 'http://www.neo-endurance.com/php/show_S3standingsGTS.php';

	
	jQuery.getJSON(url_p,function(data){

			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsP').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Motegi + '</td>' +
					'<td VALIGN="top">' +  data.Nurburgring + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.LeMans + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
	});
	
	jQuery.getJSON(url_gt,function(data){
	
			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsGT').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Motegi + '</td>' +
					'<td VALIGN="top">' +  data.Nurburgring + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.LeMans + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
	});
	
	jQuery.getJSON(url_gts,function(data){
	
			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsGTC').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Motegi + '</td>' +
					'<td VALIGN="top">' +  data.Nurburgring + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.LeMans + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
	});
});