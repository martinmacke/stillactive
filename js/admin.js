jQuery(document).ready( function($){

	$('table.wcpv-vendor-bookings-widget tr').each(function() {
		if ($(this).find("td:contains('N/A')").length) $(this).remove();
	});

});