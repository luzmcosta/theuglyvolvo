<?php
/**
* Enable using shortcodes in widgets.
*/
add_filter('widget_text', 'do_shortcode');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
 * Returns a random item from the given array.
 */
function random($defaults) {
    // Shuffle the array.
    shuffle($defaults);

    // Set first image in the shuffled array as the image to be rendered.
    $item = $defaults[0];

    return $item;
}

/**
 * Returns the path to an avatar picked randomly from an array of images.
 */
function avatar() {
    // Set the array of possible default images to choose.
    $images = array(
        get_bloginfo('template_directory') . '/assets/img/avatar_cat_close_up_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_cat_looking_up_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_cat_peeking_up_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_cat_sideways_glance_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_christopher_walken_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_kitten_stare_64.jpg',
        get_bloginfo('template_directory') . '/assets/img/avatar_playful_kitten_64.jpg'
    );

    return random($images);
}

/**
 * Gets the first image in a post.
 */
function get_first_image() {
  global $post, $posts;
  $first_img = '';

  // Turn on output buffering.
  ob_start();

  // Silently discard the buffer contents.
  ob_end_clean();

  // Search the post content for an image.
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

  // Set the first image found as the image to be rendered.
  $first_img = $matches[1][0];

  // If the post has no image associated with it...
  if (empty($first_img)) {
      $first_img = get_bloginfo('template_directory') . '/assets/img/theuglyvolvo_default_img@275.jpg';
  }

  return $first_img;
}

/**
 * Returns the URL to the featured image or the first image in the post.
 */
function get_image_url($post_id) {
    if ( has_post_thumbnail($post_id) ) {
        return wp_get_attachment_image_src(get_post_thumbnail_id($post_id));
    } else {
        return get_first_image();
    }
}

/**
 * Returns the featured image or the first image in the post.
 */
function get_main_image($post_id) {
    if ( has_post_thumbnail($post_id) ) {
        echo '<a href="'; the_permalink();
        echo '" class="thumbnail-wrapper">';
        the_post_thumbnail( array(275, 250) );
        echo '</a>';
    } else {
        echo '<a href="'; the_permalink();
        echo '" class="thumbnail-wrapper">';
        echo '<img src="' . get_first_image() . '" alt="" />';
        echo '</a>';
    }
}

/**
 * Print menu items' descriptions with menu items' labels.
 */
class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Displays the Facebook follower count.
 */
function get_facebook_user() {
    $username = 'theuglyvolvo';
    $user = file_get_contents( 'http://graph.facebook.com/' . $username );
    return json_decode( $user );
}

/**
 * Displays the Facebook follower count.
 */
function facebook_page_count( $username ) {
    return intval( get_facebook_user()->likes );
}

/**
 * Displays the Facebook like + share counts.
 */
function facebook_url_count( $url ) {
    $facebook_count = file_get_contents( 'http://graph.facebook.com/' . $url . '/likes' );

    $count = json_decode( $facebook_count );

    return intval( $count->shares );
}

/**
 * Requests user information from the Twitter API.
 */
function get_twitter_user() {
    $resource = "https://api.twitter.com/1.1/users/show.json/";
    $user_id = "screen_name=theuglyvolvo";

    // Request the user information.
    $user = file_get_contents( $resource . $user_id );

    // Return user information in JSON format.
    return json_decode( $user );
}

/**
 * Displays the Twitter follower count.
 */
function twitter_follower_count() {
    // Get user information.
    $user = get_twitter_user();

    // Return user's follower count.
    return intval( $user->followers_count );
}

/**
 * Displays the Twitter tweet count.
 */
function twitter_url_count( $url ) {
    $resource = 'http://urls.api.twitter.com/1/urls/count.json?url=';
    // Request the user information.
    $count = file_get_contents( $resource . $url );

    // Return user information in JSON format.
    return json_decode( $count )->count;
}

/**
 * Returns Pinterest count.
 */
function pinterest_count( $url ) {
    $resource = 'http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=';

    $pinterest = file_get_contents( $resource . $url );

    $response = preg_replace( '/.+?({.+}).+/','$1', $pinterest );

    return intval( json_decode( $response )->count );
}

/**
 * Get a total share count for a page.
 */
function share_count($url) {
    $facebook_count = facebook_url_count($url);
    $twitter_count = twitter_url_count($url);
    $pinterest_count = pinterest_count($url);

    $total = $facebook_count + $twitter_count + $pinterest_count;

    return intval( $total );
}
