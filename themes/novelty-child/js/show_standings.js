// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
/*	var url_Pphp = 'http://www.neo-endurance.com/php/show_standingsP.php';
	var url_gt = 'http://www.neo-endurance.com/php/show_standingsGT.php';
	var url_gtc = 'http://www.neo-endurance.com/php/show_standingsGTC.php';
	
	var url_p = 'http://www.neo-endurance.com/php/show_S2standingsP.php';
	var url_gt1 = 'http://www.neo-endurance.com/php/show_S2standingsGT1.php';
	var url_gt2 = 'http://www.neo-endurance.com/php/show_S2standingsGT2.php';

	var url_p = 'https://www.neo-endurance.com/php/show_S3standingsP.php';
	var url_gt = 'https://www.neo-endurance.com/php/show_S3standingsGT.php';
	var url_gts = 'https://www.neo-endurance.com/php/show_S3standingsGTS.php';

    var url_p = 'https://www.neo-endurance.com/php/nes4_standings_p.php';
	var url_gt = 'https://www.neo-endurance.com/php/nes4_standings_gt.php';
*/
	var url_p1 = "https://www.neo-endurance.com/php/standings/season5/p1.php";
	var url_p2 = "https://www.neo-endurance.com/php/standings/season5/p2.php";
	var url_gt = "https://www.neo-endurance.com/php/standings/season5/gt.php";
	
	loadStandingsData("P1", url_p1);
	loadStandingsData("P2", url_p2);
	loadStandingsData("GT", url_gt);
});

function loadStandingsData(category, url) {
	jQuery.getJSON(url, function (data) {
		//Open second level
		jQuery.each(data, function (index, data) {
			if (data.Pos !== "") {
				var selectElement = "#standings" + category;
				jQuery(selectElement).append('<tr>' +
					'<td>' + data.pos + '</td>' +
					'<td>' + data.num + '</td>' +
					'<td>' + data.team_name + '</td>' +
					'<td>' + data.sebring + '</td>' +
					'<td>' + data.cota + '</td>' +
					'<td>' + data.interlagos + '</td>' +
					'<td>' + data.suzuka + '</td>' +
					'<td>' + data.spa + '</td>' +
					'<td>' + data.lemans + '</td>' +
					'<td>' + data.total + '</td>' +
					'</tr>');
			}
		});
	});
}
