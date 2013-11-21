<?php
/*
Plugin Name: CFTP Brightcove
Description: Brightcove OEmbed support
Author: Tom J Nowell, Code For The People
Version: 1.0
Author URI: http://codeforthepeople.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class CFTP_BrightCove {
	public function __construct() {
		wp_embed_register_handler( 'brightcove', '#http://bcove.me/(.+)#', array( $this, 'embed_handler' ) );
	}

	function embed_handler( $matches, $attr, $url, $rawattr ) {

		$embed = sprintf(
			'<figure class="o-container brightcove">
				<iframe src="http://bcove.me/%1$s" frameborder="0" scrolling="no" width="650" height="450" marginwidth="0" marginheight="0" allowfullscreen></iframe>
			</figure>',
			esc_attr($matches[1])
		);

		return apply_filters( 'embed_brightcove', $embed, $matches, $attr, $url, $rawattr );
	}
}

new CFTP_BrightCove();