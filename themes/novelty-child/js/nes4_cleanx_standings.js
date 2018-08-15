// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {

    var url_p = 'https://www.neo-endurance.com/php/nes4_cleanx_prototype.php';
	var url_gt = 'https://www.neo-endurance.com/php/nes4_cleanx_gt.php';

	jQuery.getJSON(url_p,function(data){

		//Open second level
		jQuery.each(data, function(index, data){

			if(data.Pos !== ""){
				jQuery('#CleanXP').append(
				'<tr>'+
					'<td VALIGN="top">' + data.pos + '</td>' +
					'<td VALIGN="top">' + data.num + '</td>' +
					'<td VALIGN="top">' + data.team_name + '</td>' +
					'<td VALIGN="top">' + data.total_laps + '</td>' +
					'<td VALIGN="top">' + data.total_incs + '</td>' +
					'<td VALIGN="top">' + data.total_lpi + '</td>' +
				'</tr>'
				);
			}

		});//2nd level
	});

	jQuery.getJSON(url_gt,function(data){

		//Open second level
		jQuery.each(data, function(index, data){

			if(data.Pos !== ""){
				jQuery('#CleanXGT').append(
				'<tr>'+
                    '<td VALIGN="top">' + data.pos + '</td>' +
                    '<td VALIGN="top">' + data.num + '</td>' +
                    '<td VALIGN="top">' + data.team_name + '</td>' +
                    '<td VALIGN="top">' + data.total_laps + '</td>' +
                    '<td VALIGN="top">' + data.total_incs + '</td>' +
                    '<td VALIGN="top">' + data.total_lpi + '</td>' +
				'</tr>'
				);
			}

		});//2nd level
	});
});
