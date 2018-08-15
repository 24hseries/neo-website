jQuery( document ).ready(function() {
	//Get URL of JSON file
	var url_php = 'https://neo-endurance.com/php/nes4_pq_entrylist.php';
	
	//Load JSON file
	jQuery.getJSON(url_php,function(data){
		
		jQuery('#pq-number').html('Number of entries registered for pre-qualifying: ' + data.length);	
		
        //Open second level
		jQuery.each(data, function(index, data){
			var imgPre = '<img class="flag" src="/op-images/flags/';
			var imgPost = '.png" width="18" title="' + data.country.toUpperCase() + '" />';
			var teamNat = imgPre + data.country + imgPost;
			var twitter;
			var website;
			var classname;
			
			if(data.class === 'P'){
                
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
			jQuery('#pq-showData').append( 
				'<tr>' + 
				'<td VALIGN="top">' +  data.car + '</td>' +
				'<td VALIGN="top">' +  data.name + '</td>' +
				'<td VALIGN="top">' +  teamNat + '</td>' +
				'<td VALIGN="top"><span style="color: '+color+';">' + data.class + '</span></td>' +
				'<td VALIGN="top">' +  data.vehicle + '</td>' +
				twitter +
				website +
				'</tr>'
			);
        });
    });
});

