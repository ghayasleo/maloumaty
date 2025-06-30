<?php
global $houzez_local;
$houzez_local = houzez_get_localization();
/**
 * @package Houzez
 * @since Houzez 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<?php
$is_admin    = false;
$is_active   = false;
$is_logged_in = is_user_logged_in();

if ( $is_logged_in ) {
  $current_user = wp_get_current_user();
  if ( user_can( $current_user, 'administrator' ) ) {
    $is_admin = true;
  }
  if ( class_exists( 'MeprUser' ) ) {
    $mepr_user = new MeprUser( $current_user->ID );
    $is_active = $mepr_user->is_active();
  }
}
$is_logged_in_class = $is_logged_in ? "is-logged-in" : "is-not-logged-in";
$is_admin_class = $is_admin ? "is-admin" : "is-not-admin";
$is_active_class = $is_active ? "is-active" : "is-not-active";
$body_class = "$is_logged_in_class $is_admin_class $is_active_class"
?>
<body <?php body_class($body_class); ?>>
<style>
.item.view-more-link {
  aspect-ratio: 4/3;
  background: #083458;
}
.item.view-more-link a {
  display: flex;
  height: 100%;
  align-items: center;
  color: #fff;
  justify-content: center;
}
.side-menu-item a svg {
  transition: 0.2s;
}
.side-menu-item a svg {
	fill: #004274;
}
.side-menu-item a:hover svg {
  fill: #00aeff;
}
li.agent-phone-wrap a[href *= "api.whatsapp.com/send"]::before {
    content: "";
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24px' height='24px'%3E%3Cpath d='M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z' fill='%2327CD63'/%3E%3C/svg%3E");
    width: 24px;
    height: 24px;
    display: block;
}
li.agent-phone-wrap a[href *= "api.whatsapp.com/send"]::after {
    content: "WhatsApp";
    color: #27CD63;
    font-family: 'Atlassian Sans';
    font-weight: 600;
}
li.agent-phone-wrap a[href *= "api.whatsapp.com/send"] img {
    display: none;
}
li.agent-phone-wrap a[href *= "api.whatsapp.com/send"] {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding-block: 5px;
}
</style>
<?php wp_body_open(); ?>

<?php if(houzez_is_dashboard()) { ?>

	<?php get_template_part('template-parts/header/nav-mobile'); ?>

	<main id="main-wrap" class="main-wrap main-wrap-js dashboard-main-wrap">

	<?php get_template_part('template-parts/header/header-mobile'); ?>

<?php } else { ?>

	<?php 
	if( houzez_option('houzez_header_type') != "_custom" ) {
		get_template_part('template-parts/header/nav-mobile'); 
	}?>

	<main id="main-wrap" <?php houzez_main_wrap_class('main-wrap'); ?>>

	<?php 
	do_action( 'houzez_before_header' );

	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		
		if( function_exists('fts_header_enabled') && fts_header_enabled() ) {
			do_action( 'houzez_header_studio' );
		} else { 
			do_action( 'houzez_header' );
		}
	}

	do_action( 'houzez_after_header' );
	?>

	<?php 
	// Header Search Start 
	if( houzez_search_needed() ) {

		$search_enable = houzez_option('main-search-enable');
		$search_position = houzez_option('search_position');
		$search_pages = houzez_option('search_pages');
		$search_selected_pages = houzez_option('header_search_selected_pages');

		$adv_search_enable = get_post_meta( houzez_postid(), 'fave_adv_search_enable', true);
		$adv_search = get_post_meta( houzez_postid(), 'fave_adv_search', true);
		$adv_search_pos = get_post_meta( houzez_postid(), 'fave_adv_search_pos', true);

		if( isset( $_GET['search_pos'] ) ) {
			$search_enable = 1;
			$search_position = $_GET['search_pos'];
		}


		if ((!empty($adv_search_enable) && $adv_search_enable != 'global') && !houzez_is_transparent_logo()) {
			if ($adv_search_pos == 'under_menu') {
				if ($adv_search == 'show' || $adv_search == 'hide_show') {
					if( wp_is_mobile() ) {
						get_template_part('template-parts/search/mobile-search-main');
					} else {
						get_template_part('template-parts/search/main'); 
					}
				}
			}
		} else {
			if ( !houzez_is_transparent_logo() ) {
				if ($search_enable != 0 && $search_position == 'under_nav') {
					
					if( wp_is_mobile() ) {
						get_template_part('template-parts/search/mobile-search-main');
					} else {
						if ($search_pages == 'only_home') {
							if (is_front_page()) {
								get_template_part('template-parts/search/main'); 
							}
						} elseif ($search_pages == 'all_pages') {
							get_template_part('template-parts/search/main'); 

						} elseif ($search_pages == 'only_innerpages') {
							if (!is_front_page()) {
								get_template_part('template-parts/search/main'); 
							}
						} else if( $search_pages == 'specific_pages' ) {
						    if( is_page( $search_selected_pages ) ) {
						        get_template_part('template-parts/search/main'); 
						    }
						}
					}
				}
			}
		}
	} // Header search End

	get_template_part('template-parts/banners/main');
}?>