jQuery( document ).ready(function() {
	//Get URL of JSON file
	var url_php = 'https://neo-endurance.com/php/entry-list/nes5-entrylist.php';
	
	//Load JSON file
	jQuery.getJSON(url_php,function(data){
		
		jQuery('#number').html('Number of entries: ' + data.length);	
		
        //Open second level
		jQuery.each(data, function(index, data){
			var extraDrivers = "";
			var extraNat = "";	
			var iRatings = "";
			var driver3, driver4, driver5, driver6, driver7;
			var nat3, nat4, nat5, nat6, nat7;
			var iR3, iR4, iR5, iR6, iR7;
			var imgPre = '<img class="flag" src="/op-images/flags/';
			var imgPost = '.png" width="18" title="' + data.country.toUpperCase() + '" />';
			var teamNat = imgPre + data.country.toLowerCase() + imgPost;
			var twitter;
			var website;
			var classname;
	
			//check for 3rd driver
			if(data.d3_name != ""){
				driver3 = '<br/>' + data.d3_name;
				extraDrivers = driver3;
					
				nat3 = imgPre + data.d3_country.toLowerCase() + '.png" width="18" title="'+data.d3_country+'" />';
				extraNat = nat3;
					
				iR3 = '<br/>' + data.d3_rating;
				iRatings = iR3;
					
				//check for 4th driver
				if(data.d3_name != "" && data.d4_name != ""){
					driver4 = '<br/>' + data.d4_name;
					extraDrivers = driver3 + driver4;
						
					nat4 = imgPre + data.d4_country.toLowerCase() + '.png" width="18" title="'+data.d4_country +'" />';
					extraNat = nat3 + nat4;
						
					iR4 = '<br/>' + data.d4_rating;
					iRatings = iR3 + iR4;
						
					//check for 5th driver
					if(data.d3_name != "" && data.d4_name != "" && data.d5_name != ""){
						driver5 = '<br/>' + data.d5_name;
						extraDrivers = driver3 + driver4 + driver5;
							
						nat5 = imgPre + data.d5_country.toLowerCase() + '.png" width="18" title="'+data.d5_country +'" />';
						extraNat = nat3 + nat4 + nat5;
							
						iR5 = '<br/>' + data.d5_rating;
						iRatings = iR3 + iR4 + iR5;
							
						//check for 6th driver
						if(data.d3_name != "" && data.d4_name != "" && data.d5_name != "" && data.d6_name != ""){
							driver6 = '<br/>' + data.d6_name;
							extraDrivers = driver3 + driver4 + driver5 + driver6;
								
							nat6 = imgPre + data.d6_country.toLowerCase() + '.png" width="18" title="'+data.d6_country +'" />';
							extraNat = nat3 + nat4 + nat5 + nat6;
								
							iR6 = '<br/>' + data.d6_rating;
							iRatings = iR3 + iR4 + iR5 +iR6;
								
							//check for 7th driver
							if(data.d3_name != "" && data.d4_name != "" && data.d5_name != "" && data.d6_name != "" && data.d7_name != ""){
								driver7 = '<br/>' + data.d7_name;
								extraDrivers = driver3 + driver4 + driver5 + driver6 + driver7;
									
								nat7 = imgPre + data.d7_country.toLowerCase() + '.png" width="18" title="'+data.d7_country +'" />';
								extraNat = nat3 + nat4 + nat5 + nat6 + nat7;
									
								iR7 = '<br/>' + data.d7_rating;
								iRatings = iR3 + iR4 + iR5 +iR6 + iR7;
							}
						}
					}
				}
			}
				
			else if (data.d3_name == ""){
                
				extraDrivers = "";
			}
			
			if(data.class === 'P1'){
				var color = '#DA291C';
			}

			if(data.class === 'P2'){
				var color = '#074e9b';
			}

			if(data.class === 'GT'){
				var color = '#009635';
			}
			
			if(data.twitter != ""){
				twitter = '<td VALIGN="top"><a href="http://www.twitter.com/'+ data.twitter +'" target="_blank"><img class="flag" src="/op-images/twitterlogo.png" width="20" title="@' +  data.twitter + '" alt="'+data.twitter+'"/></a></td>';	
			}
			else{
				twitter = '<td></td>';	
			}
			
			if(data.website != ""){
				website = '<td VALIGN="top"><a href="'+ data.website +'" target="_blank"><img class="flag" src="/op-images/websitelogo.png" width="20" title="' +  data.name + '" alt="'+data.website+'"/></a></td>';	
			}
			else{
				website = '<td></td>';	
			}
			
				
			//APPEND DATA TO TABLE
			jQuery('#showData').append( 
				'<tr>' + 
				'<td VALIGN="top">' +  data.car + '</td>' +
				'<td VALIGN="top">' +  data.name + '</td>' +
				'<td VALIGN="top">' +  teamNat + '</td>' +
				'<td VALIGN="top"><span style="color: '+color+';">' + data.class + '</span></td>' +
				'<td VALIGN="top">' +  data.vehicle + '</td>' +
				'<td VALIGN="top">' +  data.d1_name + '<br/>' + 
					data.d2_name +  
					extraDrivers +
				'<td VALIGN="top">' + imgPre + data.d1_country.toLowerCase() + '.png" width="18" title="'+data.d1_country.toUpperCase()+'" />' + //'<br/>' + 
					imgPre + data.d2_country.toLowerCase() + '.png" width="18" title="'+data.d2_country.toUpperCase()+'" />' + 
					extraNat +
				'<td VALIGN="top">' +  data.d1_rating + '<br/>' + 
					data.d2_rating +
					iRatings +  
					//extraDrivers +
				twitter +
				website +
				'</tr>'
			);
        });
    });
});
