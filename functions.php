<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

add_image_size( 'video-thumb', 320, 180, true );

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
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

// Load HTML5 Blank scripts (header.php)
function my_enqueue_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

	    wp_enqueue_script( 'jquery' , array(), '' );

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1', true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

	    wp_register_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '4.4.0', true); // Bootstrap
	    wp_enqueue_script('bootstrap-js'); // Enqueue it!

	    wp_register_script('app-js', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '1.0.0', true); // Custom scripts
	    wp_enqueue_script('app-js'); // Enqueue it!

	    wp_localize_script('app-js', 'my_script_vars', array(
			    'pageTitle' =>  get_the_title(),
			    'home' => get_home_url(),
			    'member' => is_user_logged_in(),
			    'frontPage' => is_front_page()
		    )
	    );
    }
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{

    wp_register_style('app-css', get_template_directory_uri() . '/css/app.min.css', array(), '1.0', 'all');
    wp_enqueue_style('app-css'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'html5blank'), // Member Footer Navigation
        'footer-menu-member' => __('Footer Menu Member', 'html5blank'), // Member Footer Navigation
        'member-menu' => __('Member Menu', 'html5blank') // Member Menu Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

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

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
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

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="row comment_header p-3 m-0">
		<div class="comment-author vcard col-1">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
		</div>
		<div class="comment-meta commentmetadata col">
			<div class="row">
				<div class="col-12">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
					</a>
					<?php edit_comment_link(__('(Edit)'),'  ','' );
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<?php printf(__('<cite class="fn font-weight-bolder">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
				</div>
			</div>
		</div>
	</div>

<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="row">
		<div class="col-12 p-5">
			<?php comment_text() ?>
		</div>
	</div>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
//add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

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
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_lessons_post_type()
{
    register_post_type('lessons', // Register Custom Post Type Lessons
        array(
        'labels' => array(
            'name' => __('Lessons', 'lessons'), // Rename these to suit
            'singular_name' => __('Lesson', 'lessons'),
            'add_new' => __('Add New Lesson', 'lessons'),
            'add_new_item' => __('Add New Lesson', 'lessons'),
            'edit' => __('Edit Lesson', 'lessons'),
            'edit_item' => __('Edit Lesson', 'lessons'),
            'new_item' => __('New Lesson', 'lessons'),
            'view' => __('View Lesson', 'lessons'),
            'view_item' => __('View Lesson', 'lessons'),
            'search_items' => __('Search lessons', 'lessons'),
            'not_found' => __('No Lesson found', 'lessons'),
            'not_found_in_trash' => __('No Lesson found in Trash', 'lessons')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/videos-icon.png',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
	        'comments'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            //'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
add_action('init', 'create_lessons_post_type');


function lessons_cat_taxonomy() {
	// Register Taxonomies for Category
	register_taxonomy('category', 'lessons', array(
		'name'              => _x( 'Lesson categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Lesson category', 'taxonomy singular name' ),
		'search_items'      => __( 'Query lesson categories' ),
		'hierarchical' => true,
		'has_archive' => true,
		'label' => 'Lesson Categories',  //Display name
		'query_var' => true,
		'show_in_rest' => true,
		'show_ui'   => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'lessons/category' ),
	));
}
add_action( 'init', 'lessons_cat_taxonomy');

function create_video_post_type() {

	register_post_type( 'member-videos', // Register Custom Post Type Member Content
		array(
			'labels'             => array(
				'name'               => __( 'Member Content', 'member-videos' ), // Rename these to suit
				'singular_name'      => __( 'Member Content', 'member-videos' ),
				'add_new'            => __( 'Add New Video', 'member-videos' ),
				'add_new_item'       => __( 'Add New Video', 'member-videos' ),
				'edit'               => __( 'Edit Video', 'member-videos' ),
				'edit_item'          => __( 'Edit Video', 'member-videos' ),
				'new_item'           => __( 'New Video', 'member-videos' ),
				'view'               => __( 'View Video', 'member-videos' ),
				'view_item'          => __( 'View Video', 'member-videos' ),
				'search_items'       => __( 'Search Videos', 'member-videos' ),
				'not_found'          => __( 'No Video found', 'member-videos' ),
				'not_found_in_trash' => __( 'No Video found in Trash', 'member-videos' )
			),
			'public'             => true,
			'hierarchical'       => false, // Allows your posts to behave like Hierarchy Pages
			'has_archive'        => false,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'menu_icon'          => get_template_directory_uri() . '/images/videos-icon.png',
			'supports'           => array(
				'title',
				'editor',
				'thumbnail',
				'comments',
				'author'
			), // Go to Dashboard Custom HTML5 Blank post for supports
			'rewrite'            => array( 'slug' => 'member-content' ),
			'can_export'         => true, // Allows export in Tools > Export
			'show_in_rest'       => true
		) );
}

add_action( 'init', 'create_video_post_type' );
/*
function wpa_lesson_post_link( $post_link, $id = 0 ){
	$post = get_post($id);
	if ( is_object( $post ) ){
		$terms = wp_get_object_terms( $post->ID, 'lessons' );
		if( $terms ){
			return str_replace( '%category%' , $terms[0]->slug , $post_link );
		}
	}
	return $post_link;
}
add_filter( 'post_type_link', 'wpa_lesson_post_link', 1, 3 );*/

function query_post_type($query) {
	if( is_category() ) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item', 'post', 'lessons'); // don't forget nav_menu_item to allow menus to work!
		$query->set('post_type',$post_type);
		return $query;
	}
}
add_filter('pre_get_posts', 'query_post_type');


function my_save_post( $post_id )
{

	// bail early if not a models post
	if (get_post_type($post_id) !== 'member-videos') {
		return;
	}

	// bail early if editing in admin
	if (is_admin()) {
		return;
	}

	/*$url = site_url();

	if (strpos($url,'test') !== false || strpos($url,'staging') !== false ) {
		$mailTo = "matteo@mscwebservices.net";
	} else {
		$mailTo = 'mcirami@gmail.com';
	}

	$link = get_permalink($post_id);

	$to = $mailTo;
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$subject = 'A new Member Content Video was submitted';
	$body = 'A new video was submitted to the Member Content section! <br><br>To view it click here:<br>' . $link;

	wp_mail( $to, $subject, $body, $headers );
*/
	//httpPost('http//', ' ');
}

add_action('acf/save_post', 'my_save_post', 1);

function httpPost($url, $params) {

	$fields_string = array();

	foreach($params as $key => $value) {
		$fields_string .= $key . '=' . urlencode($value) . '&';
	}

	rtrim($fields_string, '&');

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//curl_setopt($ch,CURLOPT_HEADER, false);
	curl_setopt($ch,CURLOPT_POST, count($fields_string));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
}



/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Plans Page');
	acf_add_options_page('Footer');

}

?>
