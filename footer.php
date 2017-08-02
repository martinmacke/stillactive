<!-- Footer -->
<footer>
<div class="container">
<div class="row">

<div class="col-sm-3 col-xs-8">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : endif; ?>
	<a href="#" class="hidden btn btn-lg btn-trans">English <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>
	<img class="visible-lg visible-md visible-sm" src="<?php bloginfo('template_url'); ?>/images/secure-payment.png" alt="Our payments are secure">
</div>
<div class="col-sm-3 col-xs-4 visible-xs footer-mobile-social-links">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4') ) : endif; ?>
</div>
<div class="clearfix visible-xs"></div>
<div class="col-sm-3 col-xs-6">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : endif; ?>
</div>
<div class="col-sm-3 col-xs-6">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : endif; ?>
</div>
<div class="col-sm-3 col-xs-6 visible-lg visible-md visible-sm">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4') ) : endif; ?>
</div>
<div class="col-xs-12 visible-xs">
	<img style="width: 200px;margin: 10px 0;" src="<?php bloginfo('template_url'); ?>/images/secure-payment.png" alt="Our payments are secure">
</div>
</div>


<div class="clearfix visible-xs-block"></div>
<div class="col-xs-12 bottom">
	<p class="pull-left credit">© Still Active. All rights reserved.</p>
	<p class="pull-right terms"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Bottom Right') ) : endif; ?></p>
</div>

</div>
</footer>

    <div id="myModal" class="modal ">

        <div class="modal-dialog modal-lg">

                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                     <iframe id="cartoonVideo" width="100%" height="450"  src="https://www.youtube.com/watch?v=Mcz6wtgzUas"  frameborder="0" allowfullscreen></iframe>

         </div>

    </div>
    <div id="search-popup" class="modal fade still_active_popup still_active_search_popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo home_url(); ?>">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					   <center>
							<div class="popup_search_div">
								<input class="" required="required" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('What are you looking for?','stillactive'); ?>"/>
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>
					   </center>
					</div>
					<div class="modal-footer">
						<center>
							<button type="submit" class="btn btn-primary"><?php _e('Search', 'stillactive'); ?></button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<?php wp_footer(); ?>

<script>

jQuery(document).ready(function(){
	
	
	
	if( jQuery("#main_menu_mobile").length > 0 ){
		
		jQuery('#main_menu_mobile li .sub-menu').hide();
		if( jQuery("#main_menu_mobile li.menu-item-has-children > a").length > 0 ){
			// jQuery("#main_menu_mobile li.menu-item-has-children > a").append('<b class="caret sa_mobile_caret"></b>');
			$('<b class="caret sa_mobile_caret"></b>').insertAfter("#main_menu_mobile li.menu-item-has-children > a");
		}
		
		jQuery('.sa_mobile_caret').click( function(){
			jQuery(this).next().toggle();
		});
	}
    /* Show persons and calendar when see dates button is clicked */
	
	if( jQuery(".sa_see_dates").length > 0 ){
		
		jQuery('.single.single-product #wc-bookings-booking-form, .single.single-product .wc-bookings-booking-form-button').hide();
		
		jQuery(".sa_see_dates").click( function(){
			jQuery("#wc-bookings-booking-form").show();
			jQuery(".wc-bookings-booking-form-button").show();
			scroll_if_anchor("#wc-bookings-booking-form");
		});
		
		if( $("li.reviews_tab a").length > 0 ){
			$("li.reviews_tab a").click();
		}
		
		if( $(".sa_product_comments").length > 0 ){
			$(".sa_product_comments li.comment.byuser").each( function(i,val){
				console.log(i);
				if( i > 2 ){
					$(this).addClass('sa_hide_comments');
					if( '' == jQuery('.sa_see_more_reviews').text() ){
						jQuery('.sa_see_more_reviews').text('See more reviews');
					}
				}
			});
		}
		
		if( jQuery(".sa_see_more_reviews").length > 0 ){
			jQuery(".sa_see_more_reviews").click( function(){
				jQuery(this).hide();
				jQuery('.sa_hide_comments').show();
			});
		}
		
	}
	/* Save for later tooltip */
	if( $('.sa_save_later_a').length > 0 ){
		$('.sa_save_later_a').tooltip({
			title: "<?php _e('Save this activity to your wishlist. Access wishlist in your account settings.', 'stillactive'); ?>",
			placement: "auto bottom"
		});
	}
	
	/* Get iframe src attribute value i.e. YouTube video url

    and store it in a variable */

    var url = jQuery("#cartoonVideo").attr('src');

    

    /* Assign empty url value to the iframe src attribute when

    modal hide, which stop the video playing */

    jQuery("#myModal").on('hide.bs.modal', function(){

		jQuery("#cartoonVideo").attr('src', '');

    });

    

    /* Assign the initially stored url back to the iframe src

    attribute when modal is displayed again */

    jQuery("#myModal").on('show.bs.modal', function(){

        jQuery("#cartoonVideo").attr('src', url);

    });

});

jQuery('.woocommerce-LoopProduct-link > img').removeAttr('title');
    jQuery(window).on('load',function(){
		jQuery('#myModals').modal('show');
    });
</script>

<!--Tawk.to chatbox integration -->
<?php
switch(ICL_LANGUAGE_CODE){
	case "sv": $tawkto_src = "https://embed.tawk.to/58c266e95b8fe5150eef1099/1bk3s3bj4"; break;
	default: $tawkto_src = "https://embed.tawk.to/58c266e95b8fe5150eef1099/default";
}
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='<?php echo $tawkto_src; ?>';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>