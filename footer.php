</main><!-- .main-wrap start in header.php-->

<?php 

if ( ! houzez_is_splash() ) {
    if ( houzez_is_dashboard() ) {
        get_template_part('template-parts/dashboard/dashboard-footer'); 
    } else {

        do_action( 'houzez_before_footer' );

        if ((!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) && 
            (!houzez_is_half_map() || (houzez_is_half_map() && houzez_option('halfmap-footer', 1) == 1))) 
        {
            
            if( function_exists('fts_footer_enabled') && fts_footer_enabled() ) {
                do_action( 'houzez_footer_studio' );
            } else { 
                do_action( 'houzez_footer' );
            }
        }
    }
}

do_action( 'houzez_after_footer' );

do_action( 'houzez_before_wp_footer' );
?>
<script>
const listingInterval = setInterval(function() {
    if (jQuery("body.is-logged-in.is-admin .item-listing-wrap, body.is-logged-in.is-active .item-listing-wrap").length === 0) {
        jQuery('.hz-item-gallery-js').each(function() {
            var $this = jQuery(this);
            var listing_slider = $this.find('.houzez-listing-carousel');
            if (!listing_slider.hasClass('slick-reslicked') && listing_slider.slick) {
                listing_slider.slick('unslick');
                $this.find(".item:nth-child(n+4)").remove();
                const link = $this.find(".item-title a").attr("href")
                $this.find(".item:last-child").after(`<div class="item view-more-link"><a href="${link}">Click to see all images</a></div>`);
                listing_slider.slick({
                    rtl: false,
                    autoplay: false,
                    lazyLoad: 'ondemand',
                    infinite: false,
                    speed: 300,
                    slidesToShow: 1,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev slick-arrow"></button>',
                    nextArrow: '<button type="button" class="slick-next slick-arrow"></button>',
                    adaptiveHeight: true,
                });
                listing_slider.addClass("slick-reslicked")
            }
        })
    } else {
        clearInterval(listingInterval);
    }
})
</script>
<?php
wp_footer(); ?>

</body>
</html>