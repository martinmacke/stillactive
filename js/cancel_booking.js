jQuery(document).ready( function($){

	

	$('#_wc_booking_cancel_limit_unit option').each(function(i,val){

		

		if( 'day' == $(this).val() ){

			$(this).prop('selected','selected');

		}else{

			$(this).remove();

		}

		

	});

	

	$('#_wc_booking_cancel_limit').attr('max',7);

	

	$('#_wc_booking_cancel_limit').bind('keyup mouseup', function(){

		

		if( 7 < $(this).val() ){

			$(this).val(7);

		}

		

	});

});