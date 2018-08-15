/*
* @file neo12h_show_data.js
* 
* This file displays the entry list for the NEO 12 hours of Imola.
*
* @ author Niel Hekkens <nielhekkens@neo-endurance.com>
*/

var NEO12hEntryListController = (function(){
    
    var settings = {
        
        container: null,
        source: 'https://neo-endurance.com/php/neo12h_entry_list.php',
        flag: {
            
            pre: '<img class="flag" src="/op-images/flags/',
            post: '.png" width="18" />'
        }
    };
    
    // Function to create the header
    var createHeader = function(){
        
        var columns = {
        
            num: '<th><strong>Num</strong></th>',
            team: '<th><strong>Team</strong></th>',
            class: '<th><strong>Class</strong></th>',
            car: '<th><strong>Car</strong></th>',
            driver: '<th><strong>Drivers</strong></th>',
            nat: '<th><strong>Nationality</strong></th>',
            irating: '<th><strong>iRating</strong></th>',
            status: '<th><strong>Status</strong></th>'
        };
        
        var headerNode = columns.num + columns.team + columns.class + columns.car + columns.driver + columns.nat + columns.irating + columns.status;
        jQuery('#js-neo12hEntryListContainer').append(headerNode);
    };
    
    var loadEntryList = function(){
        
        createHeader();
        jQuery.getJSON(settings.source, function(data){
            
            // Go through the array
            jQuery.each(data, function(index, entry){
                
                var tableRow, number, team, car, cls, drivers, nat, irating, status, rowNode;
                
                number = '<tr><td VALIGN="top">' + entry.CarNum + '</td>';
                team = '<td VALIGN="top">' + entry.TeamName + '</td>';
                cls = '<td VALIGN="top">' + entry.Class + '</td>';
                car = '<td VALIGN="top">' + entry.Car + '</td>';
                drivers = goThroughDrivers(entry);
                nat = goThroughNat(entry);
                irating = goThroughRatings(entry);
                status = confirmedTeam(entry);
                
                rowNode = number.concat(team, cls, car, drivers, nat, irating, status);
                
                jQuery('#js-neo12hEntryListContainer').append(rowNode);
                jQuery('#js-neo12hEntryListContainer td').css('vertical-align','top');
            });
        });
    };
    
    var goThroughDrivers = function(entry){
        
        var driverList;
        
        if(entry.Driver3Name === ""){
            
            driverList = '<td VALIGN="top">' + entry.Driver1Name + '<br/>' +
                        entry.Driver2Name + '</td>';
        }
        else if(entry.Driver4Name === ""){
            
            driverList = '<td VALIGN="top">' + entry.Driver1Name + '<br/>' +
                         entry.Driver2Name + '<br/>'+
                         entry.Driver3Name + '</td>';
        }
        else if(entry.Driver5Name === ""){
            
            driverList = '<td VALIGN="top">' + entry.Driver1Name + '<br/>' +
                         entry.Driver2Name + '<br/>'+
                         entry.Driver3Name + '<br/>'+
                         entry.Driver4Name + '</td>';
        }
        else{
            
            driverList = '<td VALIGN="top">' + entry.Driver1Name + '<br/>' +
                         entry.Driver2Name + '<br/>'+
                         entry.Driver3Name + '<br/>'+
                         entry.Driver4Name + '<br/>'+
                         entry.Driver5Name + '</td>';
        }
        
        return driverList;
    };
    
    var goThroughNat = function(entry){
        
        var countryList;
        
        if(entry.Driver3Country === ""){
            
            countryList = '<td VALIGN="top"><img class="flag" src="/op-images/flags/' + entry.Driver1Country + '.png" width="18" />' +
                        '<img class="flag" src="/op-images/flags/' + entry.Driver2Country + '.png" width="18" /></td>';
        }
        else if(entry.Driver4Country === ""){
            
            countryList = '<td VALIGN="top"><img class="flag" src="/op-images/flags/' + entry.Driver1Country + '.png" width="18" />' +
                         '<img class="flag" src="/op-images/flags/' + entry.Driver2Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver3Country + '.png" width="18" /></td>';
        }
        else if(entry.Driver5Country === ""){
            
            countryList = '<td VALIGN="top"><img class="flag" src="/op-images/flags/' + entry.Driver1Country + '.png" width="18" />' +
                         '<img class="flag" src="/op-images/flags/' + entry.Driver2Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver3Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver4Country + '.png" width="18" /></td>';
        }
        else{
            
            countryList = '<td VALIGN="top"><img class="flag" src="/op-images/flags/' + entry.Driver1Country + '.png" width="18" />' +
                         '<img class="flag" src="/op-images/flags/' + entry.Driver2Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver3Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver4Country + '.png" width="18" />'+
                         '<img class="flag" src="/op-images/flags/' + entry.Driver5Country + '.png" width="18" /></td>';
        }
        
        return countryList;
    };
    
    var goThroughRatings = function(entry){
        
        var ratingList;
        
        if(entry.Driver3Rating === ""){
            
            ratingList = '<td VALIGN="top">' + entry.Driver1Rating + '<br/>' +
                        entry.Driver2Rating + '</td>';
        }
        else if(entry.Driver4Rating === ""){
            
            ratingList = '<td VALIGN="top">' + entry.Driver1Rating + '<br/>' +
                         entry.Driver2Rating + '<br/>'+
                         entry.Driver3Rating + '</td>';
        }
        else if(entry.Driver5Rating === ""){
            
            ratingList = '<td VALIGN="top">' + entry.Driver1Rating + '<br/>' +
                         entry.Driver2Rating + '<br/>'+
                         entry.Driver3Rating + '<br/>'+
                         entry.Driver4Rating + '</td>';
        }
        else{
            
            ratingList = '<td VALIGN="top">' + entry.Driver1Rating + '<br/>' +
                         entry.Driver2Rating + '<br/>'+
                         entry.Driver3Rating + '<br/>'+
                         entry.Driver4Rating + '<br/>'+
                         entry.Driver5Rating + '</td>';
        }
        
        return ratingList;
    };
    
    var confirmedTeam = function(entry){
        
        var status
        
        if(entry.Confirmed === "1"){
          
            status = '<td VALIGN="top">Confirmed</td></tr>';
        }  
        else{
            
            status = '<td VALIGN="top"></td></tr>';
        }
        
        return status;
    };
    
    return {
      
        init: function(){
            
            // Set the container and check if it exists.
            settings.container = document.getElementById('js-neo12hEntryListContainer');
            if(!settings.container){
                
                console.warn('NEO12hEntryListController.init: #js-neo12hEntryListContainer not found.');
                return;
            }
            
            loadEntryList();
        }
    };
})();

jQuery(document).ready(function() {
    
	NEO12hEntryListController.init();
});