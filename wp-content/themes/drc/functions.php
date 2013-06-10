<?php

include 'lib/metabox.php';
include 'lib/post-types.php';
include 'lib/radio-taxonomy.php'; 
include 'lib/blog-widget.php'; 	
include 'lib/job-widget.php'; 


# Register Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array('name' => 'Sidebar','before_widget' => '<div id="%1$s" class="widget-box %2$s">','after_widget' => '</div>','before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>',));
	register_sidebar(array('name' => 'Footer 1','before_widget' => '<div id="%1$s" class="widget-box %2$s">','after_widget' => '</div>',));
	register_sidebar(array('name' => 'Footer 2','before_widget' => '<div id="%1$s" class="widget-box %2$s">','after_widget' => '</div>',));

# Register Custom Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'topnav' => __( 'Top Menu' ),
      'sidenav' => __( 'Side Menu' ),
      'footnav' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


# Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


# Adds excerpts for pages
add_post_type_support( 'page', 'excerpt' );

# custom excerpt length  -  p h p   e c h o   e x c e r p t ( 4 5 )

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

# Short Titles
function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


# Post Thumbnails
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}

# Get Thumbnail URL
function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	


# Displays the comment authors gravatar if available
function dp_gravatar($size=50, $attributes='', $author_email='') {
global $comment, $settings;
if (dp_settings('gravatar')=='enabled') {
if (empty($author_email)) {
ob_start();
comment_author_email();
$author_email = ob_get_clean();
}
$gravatar_url = 'http://www.gravatar.com/avatar/' . md5(strtolower($author_email)) . '?s=' . $size . '&amp;d=' . dp_settings('gravatar_fallback');
?><img src="<?php echo $gravatar_url; ?>" <?php echo $attributes ?>/><?php
}
}


# Shortcode in widgets
add_filter('widget_text', 'do_shortcode');

# PHP in widgets
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

# Flush your rewrite rules
function custom_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		$wp_rewrite->flush_rules();
}
	
add_action( 'load-themes.php', 'custom_flush_rewrite_rules' );


# Media Upload
function insert_attachment($file_handler,$post_id,$setthumb='false') {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

	if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
	return $attach_id;
}


?>