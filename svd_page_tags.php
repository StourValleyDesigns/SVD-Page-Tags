<?php
/*
Plugin Name: SVD Page Tags
Plugin URI: http://stourvalleydesigns.com
Description: Give pages tags as well
Version: 1.0
Author: Adam Chamberlin
Author URI: http://twitter.com/funkylarma
License:
*/

/*
 * Add tags for the page and case studies content types
 */
function tags_for_pages_and_custom_post_types() {
  register_taxonomy_for_object_type( 'post_tag', 'page' );

  // Add any additional custom post types here:
  //register_taxonomy_for_object_type( 'post_tag', '<custom post type name in here>' );
}

// Return all post types from queries
function tags_query($wp_query) {
  if ( $wp_query->get( 'tag' ) ) {
    $wp_query->set( 'post_type', 'any' );
  }
}

/*
 * Add functions to the WordPress hooks
 */
add_action( 'init', 'tags_for_pages_and_custom_post_types' );
add_action('pre_get_posts', 'tags_query');