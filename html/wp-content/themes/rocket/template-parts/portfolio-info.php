<?php

// Meta Fields
$author = get_post_meta($post->ID, 'rocket_author', true);
$client = get_post_meta($post->ID, 'rocket_client', true);
$tools  = get_post_meta($post->ID, 'rocket_tools', true);
$url    = get_post_meta($post->ID, 'rocket_project_url', true);

?>

<ul class="portfolio-list-info portfolio-list-info__no-borders">
	<?php
		if ( $author !== "") {
			echo '<li><span class="info-label">' . esc_html__( 'Author:', 'rocket' ) . '</span> ' . esc_html( $author ) . '</li>';
		}

		if ( $client !== "") {
			echo '<li><span class="info-label">' . esc_html__( 'Client:', 'rocket' ) . '</span> ' . esc_html( $client ) . '</li>';
		}

		if ( $tools !== "") {
			echo '<li><span class="info-label">' . esc_html__( 'Tools:', 'rocket' ) . '</span> ' . esc_html( $tools ) . '</li>';
		}

		if ( $url !== "") {
			echo '<li><span class="info-label">' . esc_html__( 'URL:', 'rocket' ) . '</span> <a href="' . esc_url( $url ) . '">' . esc_html( $url ) . '</a></li>';
		}
	?>
</ul>