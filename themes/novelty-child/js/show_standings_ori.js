// JavaScript Document - show_standings.js
jQuery( document ).ready(function() {
	var url_p = 'https://script.googleusercontent.com/macros/echo?user_content_key=Ipgwo76OLcIpa4AfJJpTNl26CcPaZnky3oZ_w9HdrZW_W4HzXpf8NZs6xES6H3Ce7hlZGinbXB2OXPoEm-Hk0LboK8ZmE270OJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaycVgMOLFVlka630y-6eJ-L1tIWtgW61Xjrb-HVMi5TFKqbV-24DSVluhSbhVDevs_tF6wnSJtl1pC7ayND9xYxweOjygvwwFHKNOAayEeQdFlAEpejgGaZWKuFRrC0vqA5x1buD8_bLBDvO9GytH1HvOs8cFZDYfA&lib=MjdoEEM1piD56dJU3aylzR2aF27sfQqfd';
	
	var url_gt = 'https://script.googleusercontent.com/macros/echo?user_content_key=fumWXa5_ZdOTExHPw8EZn6nHmAzCEATtF-zvtrreRVYOr6-exw07s1RNgS3_iEes1jS0xyDVWm8r7rbb9a60qRHlL3eZWFhrOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaycVgMOLFVlka630y-6eJ-L1tIWtgW61Xjrb-HVMi5TFKqbV-24DSVluhSbhVDevs_tF6wnSJtl1pC7ayND9xYxweOjygvwwFHKNOAayEeQdFlAEpejgGaZWKuFRrC0vqA5x1buD8_bLwwlDX4bcQzx6IYwVMXYwp8gQH-NwAMD_&lib=MjdoEEM1piD56dJU3aylzR2aF27sfQqfd';
	
	var url_gtc = 'https://script.googleusercontent.com/macros/echo?user_content_key=OFM4nRq8zd0_vdjFDY_ed0BhAqK0q6Gb3IIJFY4fEaqDiP-Ai1dWMbnF43xz6QkUoEGmKcfYjT42mi9w_uDAwQrElZHPAwH1OJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaycVgMOLFVlka630y-6eJ-L1tIWtgW61Xjrb-HVMi5TFKqbV-24DSVluhSbhVDevs_tF6wnSJtl1pC7ayND9xYxweOjygvwwFHKNOAayEeQdFlAEpejgGaZWKuFRrC0vqA5x1buD8_bLwwlDX4bcQzzHSJqv6gaTh67_cmimgBgG&lib=MjdoEEM1piD56dJU3aylzR2aF27sfQqfd';
	
	jQuery.getJSON(url_p,function(json){
	
		//Open first level
		jQuery.each(json, function(index, data){
		
			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsP').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.Monza + '</td>' + 
					'<td VALIGN="top">' +  data.Road_Atlanta + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
		});//first level
	});
	
	jQuery.getJSON(url_gt,function(json){
	
		//Open first level
		jQuery.each(json, function(index, data){
		
			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsGT').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.Monza + '</td>' + 
					'<td VALIGN="top">' +  data.Road_Atlanta + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
		});//first level
	});
	
	jQuery.getJSON(url_gtc,function(json){
	
		//Open first level
		jQuery.each(json, function(index, data){
		
			//Open second level
			jQuery.each(data, function(index, data){
			
			if(data.Pos != ""){
				jQuery('#standingsGTC').append(
				'<tr>'+
					'<td VALIGN="top">' +  data.Pos + '</td>' +
					'<td VALIGN="top">' +  data.Team_name + '</td>' +
					'<td VALIGN="top">' +  data.Num + '</td>' +
					'<td VALIGN="top">' +  data.Sebring + '</td>' + 
					'<td VALIGN="top">' +  data.COTA + '</td>' + 
					'<td VALIGN="top">' +  data.Spa + '</td>' + 
					'<td VALIGN="top">' +  data.Monza + '</td>' + 
					'<td VALIGN="top">' +  data.Road_Atlanta + '</td>' +
					'<td VALIGN="top">' +  data.Points_total + '</td>' + 
				'</tr>'
				);
			}
				
			});//2nd level
		});//first level
	});
});