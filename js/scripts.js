$( document ).ready(function() {
	
	$('.wpcf7-validates-as-required').each(function() {
		$(this).parent().before('<span class="req"> * </span>');
	});
	
	$('.mh.min').matchHeight({
		property: 'min-height',
		target: null,
		remove: false
	});
	
	
	$('#what .slick').slick({
		infinite: false,
		autoplay: false,
		arrows: true,
		dots: false,
		pauseOnHover: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		swipeToSlide: true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 780,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 640,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		]
	});

    if($('#mostpopular .products').length){
        $("#mostpopular .products").replaceWith(
            $("<div class=\"products\">" + $("#mostpopular .products")[0].innerHTML + "</div>")
        );

        $("#mostpopular .products > li").each(function(){
            var classElem=$(this).attr('class');
            $(this).replaceWith(
                $("<div class='slide'><div class='"+classElem+"'>" + this.innerHTML + "</div></div>")
            );
        });

        $('#mostpopular .products').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            dots: false,
            pauseOnHover: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: true,
            responsive: [
            {
              breakpoint: 780,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 510,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
            ]
        });
    }
	
	$('#partners ul').slick({
		infinite: true,
		autoplay: true,
		arrows: true,
		dots: false,
		pauseOnHover: false,
		autoplaySpeed: 4000,
		slidesToShow: 5,
		slidesToScroll: 1,
		swipeToSlide: true,
		responsive: [
		{
		  breakpoint: 780,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 510,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		}	
		]
	});
	
	$('#testimonials .slick').slick({
		infinite: true,
		autoplay: false,
		arrows: true,
		dots: true,
		pauseOnHover: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		swipeToSlide: true,
	});
	
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	});
	
	
	$('.owl-carousel').owlCarousel({
		loop:true,
		dots: true,
		margin:5,
		nav:false,
		responsive:{
			0:{
				items:2
			},
			500:{
				items:3
			},
			600:{
				items:4
			},
			1000:{
				items:5,
				dots: false
			}
		}
	});
});

/*
$(document).on('click','.thumbnails .zoom', function(){
        var photo_fullsize =  $(this).find('img').attr('src').replace('-180x180','-600x600');
        $('.woocommerce-main-image img').attr('src', photo_fullsize);
        return false;
    }); 
*/

/* Automatically open external links in new tab or window */
$(document.links).filter(function() {
  return this.hostname != window.location.hostname;
}).attr('target', '_blank');

$(function() {
    //caches a jQuery object containing the header element
    var header = $("#siteheader");
	var fixedwidget = $(".fixedwidget");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 1) {
            header.addClass("scroll");
        } else {
            header.removeClass("scroll");
        }
		
		if (scroll >= 380) {
            fixedwidget.addClass("fixed");
        } else {
            fixedwidget.removeClass("fixed");
        }
    });
});

function scroll_if_anchor(href) {
    href = typeof(href) == "string" ? href : $(this).attr("href");

    // If href missing, ignore
    if(!href) return;

    // You could easily calculate this dynamically if you prefer
    var fromTop = $('#siteheader').height();

    // If our Href points to a valid, non-empty anchor, and is on the same page (e.g. #foo)
    // Legacy jQuery and IE7 may have issues: http://stackoverflow.com/q/1593174
    var $target = $(href);

    // Older browsers without pushState might flicker here, as they momentarily
    // jump to the wrong position (IE < 10)
    if($target.length) {
        $('html, body').animate({ scrollTop: $target.offset().top - fromTop });
        if(history && "pushState" in history) {
            history.pushState({}, document.title, window.location.pathname + href);
            return false;
        }
    }
}    

// When our page loads, check to see if it contains and anchor
scroll_if_anchor(window.location.hash);

// Intercept all anchor clicks
$("body").on("click", ".scrollto a[href^='#']", scroll_if_anchor);