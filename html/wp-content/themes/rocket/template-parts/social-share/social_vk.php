<?php if ( has_post_thumbnail() ) {
  $featured_img = '&image=' . get_the_post_thumbnail_url();
} else {
  $featured_img = '';
} ?>

<li><a target="_blank" onClick="popup = window.open('http://vk.com/share.php?url=<?php the_permalink(); ?>&amp;<?php the_title(); ?><?php echo $featured_img; ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-lg btn-primary btn-single-icon" rel="nofollow"><i class="fa fa-vk"></i></a></li>
