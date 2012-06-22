<?php

/*
Plugin Name: WP-Gist
Plugin URI: https://github.com/madeinnordeste/wp-gist 
Description: Easily embed and share Github gists on your WordPress blog. Original Post http://interconnectit.com/3920/embed-all-the-gists/
Version: 1
Author: Luiz Alberto
Author URI: http://beto.euqueroserummacaco.com
*/

/**
 * Usage:
 * Paste a gist link into a blog post or page and it will be embedded eg:
 * https://gist.github.com/2926827
 *
 * If a gist has multiple files you can select one using a url in the following format:
 * https://gist.github.com/2926827?file=embed-gist.php
 *
 * Original Post: 
 * http://interconnectit.com/3920/embed-all-the-gists/
 */ 
 
wp_embed_register_handler( 'gist', '/https:\/\/gist\.github\.com\/(\d+)(\?file=.*)?/i', 'wp_embed_handler_gist' );

function wp_embed_handler_gist( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<script src="https://gist.github.com/%1$s.js%2$s"></script>',
			esc_attr($matches[1]),
			esc_attr($matches[2])
			);

	return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
}

?>