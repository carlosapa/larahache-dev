<?php
/*
*
* Template Name: Single
*
*/
?>
<?php get_header(); ?>

<div class="title_holder">
	<h2 class="title js-scroll-noticias">Noticias</h2 class="title">
</div>
<div id="post-feed">	
<?php
	$args = array ('category_name' => 'post', 'orderby' => 'date', 'order' => 'DESC');	
	$query_feed = new WP_Query( $args );
	$i = 0;
	$feed_post = $query_feed->posts;
	if ($query_feed->have_posts()) {
		while ($query_feed->have_posts()) {
			$query_feed->the_post();
			$feed_meta = get_post_meta($feed_post[$i]->ID);
			?>

			<div id="feed-block" class="">
				
				<div id="feed-image">
					<?php
						if (has_post_thumbnail( $feed_post[$i]->ID )) {
							$attr = array(
								'src'	=> $src,
								'class'	=> "attachment-$size",
								'alt'	=> trim(strip_tags( $attachment->post_excerpt )),
								'title'	=> trim(strip_tags( $attachment->post_title ))
							);
							get_the_post_thumbnail( $feed_post[$i]->ID, $attr);
						} else {
							$src = wp_get_attachment_image_src($feed_meta['post-image_type'][0]);
							?>
							<img src="<?php echo $src[0];?>" />
						<?php }
					?>
				</div>
				<div id="feed-info">
					<div id="feed-header">
						<div id="feed-title"><?php echo $feed_post[$i]->post_title; ?></div>
						<div id="feed-date"><?php echo get_the_formated_date($feed_post[$i]->ID); ?></div>
						<div id="feed-author"><?php echo get_formated_author($feed_post[$i]->post_author); ?></div>		
					</div>
					<div id="feed-content"><?php echo content_to($feed_post[$i]->ID); ?></div>
					<div id="feed-readmore"><a href="<?php echo $feed_post[$i]->guid; ?>" target="_blank">Ver más de este post</a></div>
				</div>
			</div><!-- end of feed block -->

			<?php 
			$i++;
		}
	}
	wp_reset_postdata();
?>
</div><!-- end of feed -->


<div id="twitter-feed">

</div>

<footer>

</footer>
<?php get_footer(); ?>