<?php
/* ////////// IMPORTANT ///////////

INCLUDE THE BELOW CONTENT ABOVE THE WP DIRECTIVES IN THE HTACCESS FILE AFTER IT IS GENERATED.

THIS WILL FIX CORS FONT ERRORS.

DELETE THIS FROM FUNCTIONS WHEN COMPLETE

<----   START COPY --- >

<IfModule mod_setenvif.c>
<IfModule mod_headers.c>
<FilesMatch "\.(gif|png|jpe?g|svg|svgz|ico|webp)$">
SetEnvIf Origin ":" IS_CORS
Header set Access-Control-Allow-Origin "*" env=IS_CORS
</FilesMatch>
</IfModule>
</IfModule>
<IfModule mod_headers.c>
<FilesMatch ".(eot|otf|ttf|woff|woff2)">
    Header set Access-Control-Allow-Origin "*"
</FilesMatch>
</IfModule>

<!----- END COPY --->

*/

function fug_setup()
{
    add_editor_style();
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'fug_setup');


/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/

/* HTML 5 Boiler Plate Fixes */
// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
//function my_css_attributes_filter($var)
//{
//    return is_array($var) ? array() : '';
//}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}


// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)="d*"s/', "", $html);
    return $html;
}
/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/


// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}
/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/

/* Modify Main Nav Styles */
function main_theme_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'nav navMenu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}
/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/

/* Modify Extra Nav Styles
function extra_theme_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'extra-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'nav navMenu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}  */


/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/

/* CUSTOM MENUS

function wpb_custom_new_menu()
{
    register_nav_menu('MENU_NAME', __('MENU NAME'));
    register_nav_menu('MENU_NAME', __('MENU NAME'));
    register_nav_menu('MENU_NAME', __('MENU NAME'));
}
add_action('init', 'wpb_custom_new_menu');

*/

/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/

/*JS LIBRARIES */

/* Enqueue Scripts */
function theme_header_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    // wp_register_script('ScrollMagicGSAP', get_template_directory_uri() . '/js/lib/animation.gsap.min.js', array(), '0.6.0', true);
    // wp_enqueue_script('ScrollMagicGSAP');

    // wp_register_script('attrGSAP', get_template_directory_uri() . '/js/lib/AttrPlugin.min.js', array(), '0.6.0', true);
    // wp_enqueue_script('attrGSAP');

    // wp_register_script('CSSPlugin', get_template_directory_uri() . '/js/lib/CSSPlugin.min.js', array(), '0.1.3', true);
    // wp_enqueue_script('CSSPlugin');

    // wp_register_script('DrawSVGPlugin', get_template_directory_uri() . '/js/lib/DrawSVGPlugin.min.js', array(), '0.1.3', true);
    // wp_enqueue_script('DrawSVGPlugin');

    // wp_register_script('imagesLoaded', get_template_directory_uri() . '/js/lib/imagesLoaded.js', array(), '4.1.1', true);
    // wp_enqueue_script('imagesLoaded');

    // wp_register_script('isotope', get_template_directory_uri() . '/js/lib/isotope.js', array(), '3.0.4', true);
    //  wp_enqueue_script('isotope'); // Enqueue it!

    // wp_register_script('lightbox', get_template_directory_uri() . '/js/lib/lity.min.js', array(), '', true);
    // wp_enqueue_script('lightbox'); // Enqueue it!

    // wp_register_script('MorphSVGPlugin', get_template_directory_uri() . '/js/lib/MorphSVGPlugin.min.js', array(), '', true);
    // wp_enqueue_script('MorphSVGPlugin');

    // wp_register_script('ScrollMagic', get_template_directory_uri() . '/js/lib/ScrollMagic.min.js', array(), '0.6.0', true);
    // wp_enqueue_script('ScrollMagic');

    // wp_register_script('slickslider', get_template_directory_uri() . '/js/lib/slick.js', array('jquery'), '1.6.0', true);
    // wp_enqueue_script('slickslider');

    //  wp_register_script('SmoothScroll', get_template_directory_uri() . '/js/lib/smooth-scroll.js', array(), '0.131', true);
    //  wp_enqueue_script('SmoothScroll');

    wp_register_script('Tweenmax', get_template_directory_uri() . '/js/lib/TweenMax.min.js', array(), '1.19.1', true);
    wp_enqueue_script('Tweenmax');

    // ENQUEUE COMPILED SCRIPTS
    wp_register_script('themescripts', get_template_directory_uri() . '/scripts.js', array('jquery'), '1.0.0');
    wp_enqueue_script('themescripts');
  }
}


/* UPGRADE JQUERY */
function modify_jquery_version()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery',
'http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery_version');


/* Enqueue Styles */
function theme_style() {
  // wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Montserrat:400,700,900|Roboto:300i,400,400i,500,500i,700,700i", false );

  wp_register_style('fontawesome', '//use.fontawesome.com/releases/v5.0.9/css/all.css', array(), '5.0.9', 'all');
  wp_enqueue_style('fontawesome'); // Enqueue it!

  wp_register_style('themefonts', get_template_directory_uri() . '/fonts/fonts.css', array(), '1.0', 'all');
  wp_enqueue_style('themefonts'); // Enqueue it!

  wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '7.0', 'all');
  wp_enqueue_style('normalize'); // Enqueue it!

  //wp_register_style('SlickSlider', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
  //wp_enqueue_style('SlickSlider'); // Enqueue it!

  //wp_register_style('SlickTheme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');
  //wp_enqueue_style('SlickTheme'); // Enqueue it!

  //wp_register_style('lightbox', get_template_directory_uri() . '/css/lity.min.css', array(), '0.131', 'all');
  //wp_enqueue_style('lightbox'); // Enqueue it!

  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

}
add_action('wp_enqueue_scripts', 'theme_style');



// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'theme'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'theme') // Sidebar Navigation

    ));
}


/*//////////////////////////////*/
/*//////////////////////////////*/
/*//////////////////////////////*/


/*	Actions + Filters + ShortCodes	*/

// Add Actions
add_action('init', 'theme_header_scripts'); // Add Custom Scripts to wp_head
// add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet
add_action('init', 'html5wp_pagination'); // Add HTML5 Pagination
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// ADD CUSTOM NAV CLASS
// add_filter('nav_menu_css_class', 'custom_active_item_classes', 10, 2);



/*//////////////////////////////*/
/* GLOBAL THEME SAUCE */
/*//////////////////////////////*/


/*	ALLOW SVG UPLOAD XMLRPC 	*/
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*	ACF GLOBAL OPTIONS */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Global Options',
        'menu_title'    => 'Global Options',
        'menu_slug'    => 'global_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-media-spreadsheet',
        'position' => 6
    ));
}
    /*  ACF GLOBAL	*/

function is_post_type($type)
{
    global $wp_query;
    if ($type == get_post_type($wp_query->post->ID)) {
        return true;
    }
    return false;
}


/*//////////////////////////////*/
/* CLIENT THEME SAUCE */
/*//////////////////////////////*/

/* NEW FEATURED IMAGE SIZES */
// add_image_size('image-name', 500, 9999);
// add_image_size('image-name', 500, 300, true);


/* CUSTOM POST TYPES  */

// add_action('init', 'create_post_type');

//  function create_post_type()
//  {
//      register_post_type('events',
//      // CPT Options
//          array(
//              'labels' => array(
//                  'name' => __('Events'),
//                  'singular_name' => __('Event')
//              ),
//              'public' => true,
//              'menu_icon' => 'dashicons-portfolio',
//              'has_archive' => true,
//              'supports' => array('title','editor'),
//          )
//      );
//  }

/* 	CPT TAXONOMIES 	*/

// add_action('init', 'add_events_taxonomies');

// function add_events_taxonomies()
// {
//    $labels = array(
//        'name'            => 'Types',
//        'singular_name'   => 'Type',
//        'search_items'    => 'Search Types',
//        'edit_item'       => 'Edit Type',
//        'update_item'     => 'Update Type',
//        'add_new_item'     => 'Add New Type',
//        'new_item_name'    => 'New Type',
//        'menu_name'        => 'Type',
//    );
//    $args = array(
//        'labels'            => $labels,
//        'public'            =>  true,
//        'hierarchical'      =>  true,
//        'show_in_nav_menus' =>  true,
//       	'has_archive'       =>  true,
//        'show_ui'           =>  true,
//        'show_admin_column' =>  true,
//        'rewrite'           =>  array('slug' => 'event-type', 'with_front' => false),
//    );
//    register_taxonomy('event-type', array('events'), $args);
// }


/*//////////////////////////////*/
/* CLIENT ADMIN BRANDING GLOBAL MODS */
/*//////////////////////////////*/

/* CHANGE DEFAULT POSTS LABEL */


// function change_post_label()
// {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Press';
//     $submenu['edit.php'][5][0] = 'Press';
//     $submenu['edit.php'][10][0] = 'Add Press';
//     $submenu['edit.php'][16][0] = 'Press Tags';
//     echo '';
// }
// function change_post_object()
// {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'Press';
//     $labels->singular_name = 'Press';
//     $labels->add_new = 'Add Press';
//     $labels->add_new_item = 'Add Press';
//     $labels->edit_item = 'Edit Press';
//     $labels->new_item = 'Press';
//     $labels->view_item = 'View Press';
//     $labels->search_items = 'Search Press';
//     $labels->not_found = 'No Press found';
//     $labels->not_found_in_trash = 'No Press found in Trash';
//     $labels->all_items = 'All Press';
//     $labels->menu_name = 'Press';
//     $labels->name_admin_bar = 'Press';
// }

// add_action('admin_menu', 'change_post_label');
// add_action('init', 'change_post_object');


/*	BRAND ADMIN LOGIN WITH COMPANY 	*/


function custom_login_logo()
{
    echo '<style type="text/css">
	h1 a { background-image: url('.get_template_directory_uri().'/img/logo-admin.png) !important;background-size: 300px 300px !important;width:300px !important;height:300px !important;}
	</style>';
}
add_action('login_head', 'custom_login_logo');


/*	CUSTOMIZE ADMIN FOOTER 	*/

function remove_footer_admin()
{
    echo '<span id="footer-thankyou"> Made with love by <a target="_blank" href="#">COMPANY</a> </span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');




/* ADMIN AREA CLEANUP AND GLOBAL MODS */

function remove_dashboard_meta()
{
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action('admin_init', 'remove_dashboard_meta');


if (!function_exists('disable_default_dashboard_widgets')) {
    function disable_default_dashboard_widgets()
    {
        global $wp_meta_boxes;
        // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['welcome_panel']);        // Activity Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //
        // remove plugin dashboard boxes
        // unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
        // unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
        // unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget
    }
    add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets');
}


/*//////////////////////////////*/
/*  CORE CLEANUP AND SYSTEM MODS  */
/*//////////////////////////////*/

/* SET UPLOAD LIMITS */

/* USE HTACCESS TO CONTROL UPLOAD LIMITS */
            //	php_value upload_max_filesize 5M
            // 	php_value post_max_size 5M
            //	php_value max_execution_time 300
            //	php_value max_input_time 300


/* 	Disable the emoji's 	*/

function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
* REMOVE EMOJIS
* @param array $plugins
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array( 'wpemoji' ));
    } else {
        return array();
    }
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array( $emoji_svg_url ));
    }

    return $urls;
}


// Remove Wordpress Menu Items
function remove_menus(){

  if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();
    if (!in_array($current_user->ID, array(1))) {

      remove_menu_page( 'edit.php' );                  //Posts
      remove_menu_page( 'index.php' );                  //Dashboard
    //   remove_menu_page( 'jetpack' );                    //Jetpack*
      remove_menu_page( 'edit-comments.php' );          //Comments
      remove_menu_page( 'themes.php' );                 //Appearance
      remove_menu_page( 'plugins.php' );                //Plugins
    //   // remove_menu_page( 'users.php' );                  //Users
      remove_menu_page( 'tools.php' );                  //Tools
    //   remove_menu_page( 'options-general.php' );        //Settings
      remove_menu_page('edit.php?post_type=acf-field-group');      //ACF
    }
  }
}
add_action( 'admin_menu', 'remove_menus', 9999);

/*	DISABLE XMLRPC 	*/
add_filter('xmlrpc_enabled', '__return_false');
