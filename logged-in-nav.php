<?php
global $current_user, $houzez_local;
wp_get_current_user();
$userID  =  $current_user->ID;
$current_user = wp_get_current_user();
$roles = $current_user->roles;
$dash_profile_link = houzez_get_template_link_2('template/user_dashboard_profile.php');
$dashboard_insight = houzez_get_template_link_2('template/user_dashboard_insight.php');
$dashboard_crm = houzez_get_template_link_2('template/user_dashboard_crm.php');
$dashboard_listings = houzez_get_template_link_2('template/user_dashboard_properties.php');
$dashboard_add_listing = houzez_get_template_link_2('template/user_dashboard_submit.php');
$dashboard_favorites = houzez_get_template_link_2('template/user_dashboard_favorites.php');
$dashboard_search = houzez_get_template_link_2('template/user_dashboard_saved_search.php');
$dashboard_invoices = houzez_get_template_link_2('template/user_dashboard_invoices.php');
$dashboard_msgs = houzez_get_template_link_2('template/user_dashboard_messages.php');
$dashboard_membership = houzez_get_template_link_2('template/user_dashboard_membership.php');
$dashboard_gdpr = houzez_get_template_link_2('template/user_dashboard_gdpr.php');
$dashboard_seen_msgs = add_query_arg( 'view', 'inbox', $dashboard_msgs );
$dashboard_unseen_msgs = add_query_arg( 'view', 'sent', $dashboard_msgs );
$home_link = home_url('/');
$enable_paid_submission = houzez_option('enable_paid_submission');
$create_lisiting_enable = houzez_option('create_lisiting_enable');
$header_style = houzez_option('header_style');

$agency_agents = add_query_arg( 'agents', 'list', $dash_profile_link );

$header_create_listing_template = $dashboard_add_listing;

$create_listing_title = houzez_option('dsh_create_listing', 'Create a Listing');

$custom_create_lisiting_btn = houzez_option('custom_create_lisiting_btn', 0);
$custom_create_lisiting_link = houzez_option('custom_create_lisiting_link');
$custom_create_lisiting_title = houzez_option('custom_create_lisiting_title');

if( $custom_create_lisiting_btn && !empty($custom_create_lisiting_link) ) {
    $header_create_listing_template = $custom_create_lisiting_link;
    $create_listing_title = !empty($custom_create_lisiting_title) ? $custom_create_lisiting_title : $create_listing_title;
}

$ac_crm = $ac_insight = $ac_profile = $ac_props = $ac_add_prop = $ac_fav = $ac_search = $ac_invoices = $ac_msgs = $ac_mem = $ac_gdpr = $ac_agents = '';
if( is_page_template( 'template/user_dashboard_profile.php' ) ) {
    $ac_profile = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_properties.php' ) ) {
    $ac_props = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_submit.php' ) ) {
    $ac_add_prop = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_saved_search.php' ) ) {
    $ac_search = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_favorites.php' ) ) {
    $ac_fav = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_invoices.php' ) ) {
    $ac_invoices = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_messages.php' ) ) {
    $ac_msgs = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_membership.php' ) ) {
    $ac_mem = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_gdpr.php' ) ) {
    $ac_gdpr = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_insight.php' ) ) {
    $ac_insight = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_crm.php' ) ) {
    $ac_crm = 'class=active';
} elseif( isset( $_GET['agents'] ) && $_GET['agents'] == 'list' ) {
    $ac_agents = 'class=active';
}


$user_custom_picture = houzez_get_profile_pic($userID);

?>
<nav class="logged-in-nav-wrap navi-login-register slideout-menu slideout-menu-right" id="navi-user">
    <div class="d-flex justify-content-end">
    <?php if( $create_lisiting_enable != 0 || !empty(houzez_option('hd1_4_phone'))){ ?>
    <div class="login-register-nav">

        <?php if( !empty(houzez_option('hd1_4_phone')) && houzez_option('hd1_4_phone_enable', 0) && ( $header_style == 1 || $header_style == 4 ) ) { ?>
        <span class="btn-phone-number">
            <a href="tel:<?php echo houzez_option('hd1_4_phone'); ?>"><i class="houzez-icon icon-phone-actions-ring mr-1"></i> <?php echo houzez_option('hd1_4_phone'); ?></a>
        </span>
        <?php } ?>

        <?php if( $create_lisiting_enable != 0 && houzez_check_role() ){ ?>
        <a class="btn btn-create-listing hidden-xs hidden-sm" href="<?php echo esc_url($header_create_listing_template); ?>">
            <?php echo esc_attr($create_listing_title); ?>
        </a>
        <?php } ?>

    </div>
    <?php } ?>
    <div class="navbar-logged-in-wrap navbar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img width="42" height="42" alt="author" src="<?php echo esc_url($user_custom_picture ); ?>" class="rounded">
        </a>
        <ul class="logged-in-nav dropdown-menu">
            <?php
            if (in_array('houzez_buyer', (array)$roles)) {
                echo '<li class="side-menu-item">
                        <a '.$ac_insight.' href="/mijn-account-2/?action=home">
                            <svg fill="#004274" class="mr-2" width="13" height="13" viewBox="0 0 1024 1024"><g transform=""><path d="M1024 590.444l-512-397.426-512 397.428v-162.038l512-397.426 512 397.428zM896 576v384h-256v-256h-256v256h-256v-384l384-288z"></path></g></svg>
                            My Profile
                        </a>
                    </li>';
                echo '<li class="side-menu-item">
                        <a '.$ac_insight.' href="/mijn-account-2/?action=payments">
                            <svg fill="#004274" class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="13" height="13" viewBox="0 0 20 20" data-tags="credit-card"><g transform="scale(0.01953125 0.01953125)"><path d="M921.6 307.2v-102.4h-819.2v102.4h819.2zM921.6 512h-819.2v307.2h819.2v-307.2zM0 204.8c0-56.32 46.080-102.4 102.4-102.4h819.2c56.554 0 102.4 45.846 102.4 102.4v0 614.4c0 56.554-45.846 102.4-102.4 102.4v0h-819.2c-56.554 0-102.4-45.846-102.4-102.4v0-614.4zM204.8 614.4h204.8v102.4h-204.8v-102.4z"/></g></svg>
                            Payments
                        </a>
                    </li>';
                echo '<li class="side-menu-item">
                        <a '.$ac_insight.' href="/mijn-account-2/?action=subscriptions">
                            <svg fill="#004274" class="mr-2" width="13" height="13" viewBox="0 0 1024 1024"><g transform=""><path d="M889.68 166.32c-93.608-102.216-228.154-166.32-377.68-166.32-282.77 0-512 229.23-512 512h96c0-229.75 186.25-416 416-416 123.020 0 233.542 53.418 309.696 138.306l-149.696 149.694h352v-352l-134.32 134.32z"></path><path d="M928 512c0 229.75-186.25 416-416 416-123.020 0-233.542-53.418-309.694-138.306l149.694-149.694h-352v352l134.32-134.32c93.608 102.216 228.154 166.32 377.68 166.32 282.77 0 512-229.23 512-512h-96z"></path></g></svg>
                            Subscriptions
                        </a>
                    </li>';
            } else {
                if( !empty( $dashboard_crm ) && houzez_check_role() ) {
                    echo '<li class="side-menu-item">';
                            echo '<a '.$ac_crm.' href="'.esc_url($dashboard_crm).'">';
                                echo '<i class="houzez-icon icon-layout-dashboard mr-2"></i></span> '.houzez_option('dsh_board', 'Board').'
                            </a>';

                        echo '</li>';
                }

                if( !empty( $dashboard_insight ) && houzez_check_role() ) {
                    echo '<li class="side-menu-item">
                            <a '.$ac_insight.' href="'.esc_url($dashboard_insight).'">
                                <i class="houzez-icon icon-analytics-bars mr-2"></i> '.houzez_option('dsh_insight', 'Insight').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_listings ) && houzez_check_role() ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr( $ac_props ).' href="'.esc_url($dashboard_listings).'">
                                <i class="houzez-icon icon-building-cloudy mr-2"></i> '.houzez_option('dsh_props', 'Properties').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_add_listing ) && houzez_check_role() ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr( $ac_add_prop ).' href="'.esc_url($dashboard_add_listing).'">
                                <i class="houzez-icon icon-add-circle mr-2"></i> '.houzez_option('dsh_create_listing', 'Create a Listing').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_favorites ) ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr( $ac_fav ).' href="'.esc_url($dashboard_favorites).'">
                                <i class="houzez-icon icon-love-it mr-2"></i> '.houzez_option('dsh_favorite', 'Favorites').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_search ) ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr( $ac_search ).' href="'.esc_url($dashboard_search).'">
                                <i class="houzez-icon icon-search mr-2"></i> '.houzez_option('dsh_saved_searches', 'Saved Searches').'
                            </a>
                        </li>';
                }

                if( !empty($dashboard_membership) && $enable_paid_submission == 'membership' && houzez_check_role() && ! houzez_is_admin() ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr($ac_mem).' href="'.esc_attr($dashboard_membership).'">
                                <i class="houzez-icon icon-task-list-text-1 mr-2"></i> '.houzez_option('dsh_membership', 'Membership').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_invoices ) && houzez_check_role() ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr(  $ac_invoices ).' href="'.esc_url($dashboard_invoices).'">
                                <i class="houzez-icon icon-accounting-document mr-2"></i> '.houzez_option('dsh_invoices', 'Invoices').'
                            </a>
                        </li>';
                }

                if( !empty( $dash_profile_link ) && houzez_is_agency() ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr(  $ac_agents ).' href="'.esc_url($agency_agents).'">
                                <i class="houzez-icon icon-single-neutral mr-2"></i> '.houzez_option('dsh_agents', 'Agents').'
                            </a>
                        </li>';
                }

                if( !empty( $dashboard_msgs ) ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr(  $ac_msgs ).' href="'.esc_url($dashboard_msgs).'">
                                <i class="houzez-icon icon-messages-bubble mr-2"></i> '.houzez_option('dsh_messages', 'Messages').'
                            </a>
                        </li>';
                }

                if( !empty( $dash_profile_link ) ) {
                    echo '<li class="side-menu-item">
                            <a '.esc_attr( $ac_profile ).' href="'.esc_url($dash_profile_link).'">
                                <i class="houzez-icon icon-single-neutral-circle mr-2"></i> '.houzez_option('dsh_profile', 'My profile').'
                            </a>
                        </li>'; 
                }
            }

            echo '<li class="side-menu-item">
                    <a href="' . wp_logout_url( home_url() ) . '">
                        <i class="houzez-icon icon-lock-5 mr-2"></i> '.houzez_option('dsh_logout', 'Log out').'
                    </a>
                </li>';
            ?>
        </ul><!-- logged-in-nav -->
    </div><!-- .navbar-logged-in-wrap -->
    </div>
</nav><!-- .logged-in-nav-wrap -->