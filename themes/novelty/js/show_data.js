jQuery( document ).ready(function() {
	//Get URL of JSON file
	//var url = 'https://script.google.com/macros/s/AKfycby_hrcxUVdmrupwQve9Umkem8wpQD-AN527Iva8jmnChy_-Ahc/exec?id=0Aqve1o8CW3t7dHBpQXliZ0lSZXhrbXJHN2wyb0Zqcnc&sheet=Entries';
	var url_php = 'http://neo-endurance.com/php/show_data.php';
	
	//Load JSON file
	jQuery.getJSON(url_php,function(data){
		
		jQuery('#number').html('Number of entries: '+data.length);	
		//Open second level
		jQuery.each(data, function(index, data){
			var extraDrivers = "";
			var extraNat = "";	
			var iRatings = "";
			var driver3, driver4, driver5, driver6, driver7; //driver8;
			var nat3, nat4, nat5, nat6, nat7;//, nat8;
			var iR3, iR4, iR5, iR6, iR7;//, iR8;
			var imgPre = '<img class="flag" src="http://www.neo-endurance.com/live/images/flags/';
			var imgPost = '.png" width="18" title="'+data.Country.toUpperCase()+'" />';
			var teamNat = imgPre + data.Country + imgPost;
			var twitter;
			var website;
			var classname;
	
			//check for 3rd driver
			if(data.D3_Name != ""){
				driver3 = '<br/>' + data.D3_Name;
				extraDrivers = driver3;
					
				nat3 = imgPre + data.D3_Country + '.png" width="18" title="'+data.D3_Country.toUpperCase()+'" />';
				extraNat = nat3;
					
				iR3 = '<br/>' + data.D3_iRating;
				iRatings = iR3;
					
				//check for 4th driver
				if(data.D3_Name != "" && data.D4_Name != ""){
					driver4 = '<br/>' + data.D4_Name;
					extraDrivers = driver3 + driver4;
						
					nat4 = imgPre + data.D4_Country + '.png" width="18" title="'+data.D4_Country.toUpperCase()+'" />';
					extraNat = nat3 + nat4;
						
					iR4 = '<br/>' + data.D4_iRating;
					iRatings = iR3 + iR4;
						
					//check for 5th driver
					if(data.D3_Name != "" && data.D4_Name != "" && data.D5_Name != ""){
						driver5 = '<br/>' + data.D5_Name;
						extraDrivers = driver3 + driver4 + driver5;
							
						nat5 = imgPre + data.D5_Country + '.png" width="18" title="'+data.D5_Country+'" />';
						extraNat = nat3 + nat4 + nat5;
							
						iR5 = '<br/>' + data.D5_iRating;
						iRatings = iR3 + iR4 + iR5;
							
						//check for 6th driver
						if(data.D3_Name != "" && data.D4_Name != "" && data.D5_Name != "" && data.D6_Name != ""){
							driver6 = '<br/>' + data.D6_Name;
							extraDrivers = driver3 + driver4 + driver5 + driver6;
								
							nat6 = imgPre + data.D6_Country + '.png" width="18" title="'+data.D6_Country.toUpperCase()+'" />';
							extraNat = nat3 + nat4 + nat5 + nat6;
								
							iR6 = '<br/>' + data.D6_iRating;
							iRatings = iR3 + iR4 + iR5 +iR6;
								
							//check for 7th driver
							if(data.D3_Name != "" && data.D4_Name != "" && data.D5_Name != "" && data.D6_Name != "" && data.D7_Name != ""){
								driver7 = '<br/>' + data.D7_Name;
								extraDrivers = driver3 + driver4 + driver5 + driver6 + driver7;
									
								nat7 = imgPre + data.D7_Country + '.png" width="18" title="'+data.D7_Country.toUpperCase()+'" />';
								extraNat = nat3 + nat4 + nat5 + nat6 + nat7;
									
								iR7 = '<br/>' + data.D7_iRating;
								iRatings = iR3 + iR4 + iR5 +iR6 + iR7;
									
								/*//check for 8th driver
								if(data.D3_Name != "" && data.D4_Name != "" && data.D5_Name != "" && data.D6_Name != "" && data.D7_Name != "" && data.D8_Name != ""){
									driver8 = '<br/>' + data.D8_Name;
									extraDrivers = driver3 + driver4 + driver5 + driver6 + driver7 + driver8;
										
									nat8 = imgPre + data.D8_Country + '.png" width="18" title="'+data.D8_Country.toUpperCase()+'" />';
									extraNat = nat3 + nat4 + nat5 + nat6 + nat7 + nat8;
										
									iR8 = '<br/>' + data.D8_iRating;
									iRatings = iR3 + iR4 + iR5 +iR6 + iR7 + iR8;
								}*/
							}
						}
					}
				}
			}
				
			else if (data.D3_Name == ""){
				extraDrivers = "";
			}
			
			if(data.Class === "Prototype (P)"){
				var color = '#074e9b';
				classname = 'P';
				data.Car = 'HPD ARX-01c';
			}
			if(data.Class === "Grand Touring (GT)"){
				var color = '#009635';
				classname = 'GT';
			}
			if(data.Class === "Grand Touring Sport (GTS)"){
			//	var color = '#e56a02';
				classname = 'GTS';	
			}
			
			if(data.TeamTwitter != ""){
				twitter = '<td VALIGN="top"><a href="http://www.twitter.com/'+ data.TeamTwitter +'" target="_blank"><img class="flag" src="http://www.neo-endurance.com/live/images/twitterlogo.png" width="20" title="@' +  data.TeamTwitter + '" alt="'+data.TeamTwitter+'"/></a></td>';	
			}
			else{
				twitter = '<td></td>';	
			}
			
			if(data.TeamWebsite != ""){
				website = '<td VALIGN="top"><a href="'+ data.TeamWebsite +'" target="_blank"><img class="flag" src="http://www.neo-endurance.com/live/images/websitelogo.png" width="20" title="' +  data.TeamName + '" alt="'+data.TeamWebsite+'"/></a></td>';	
			}
			else{
				website = '<td></td>';	
			}
			
				
			//APPEND DATA TO TABLE
			jQuery('#showData').append( 
				'<tr>' + 
				'<td VALIGN="top">' +  data.CarNum + '</td>' +
				'<td VALIGN="top">' +  data.TeamName + '</td>' +
				'<td VALIGN="top">' +  teamNat + '</td>' +
				'<td VALIGN="top"><span style="color: '+color+';">' +  /*data.Class*/classname + '</span></td>' +
				'<td VALIGN="top">' +  data.Car + '</td>' +
				'<td VALIGN="top">' +  data.D1_Name + '<br/>' + 
					data.D2_Name +  
					extraDrivers +
				'<td VALIGN="top">' + imgPre + data.D1_Country + '.png" width="18" title="'+data.D1_Country.toUpperCase()+'" />' + //'<br/>' + 
					imgPre + data.D2_Country + '.png" width="18" title="'+data.D2_Country.toUpperCase()+'" />' + 
					extraNat +
				'<td VALIGN="top">' +  data.D1_iRating + '<br/>' + 
					data.D2_iRating +
					iRatings +  
					//extraDrivers +
				twitter +
				website +
				'</tr>'
			);
			});
		});
	//});
	//jQuery.getJSON(url,function(json){
	
		//Open first level
		
	
	
});

