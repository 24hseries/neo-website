jQuery(function($){

	$(function(){

		load_diim();

	});

	function load_diim(){

		var button = $('#tesla-diim-button');
		var result = $('#tesla-diim-result');

		button.click(function(){

			button.prop('disabled',true);
			result.text('Working..');

			$.post(tesla_diim.ajaxurl,$.param({action:'tesla_diim',tesla_diim_nonce:tesla_diim.nonce}),function(){
			    result.text('The operation has been completed successfully.');
			}).fail(function(){
			    result.text('An error has been encountered.')
			}).always(function(){
			    button.prop('disabled',false);
			});

		});

	}

});