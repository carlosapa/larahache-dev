<?php
/*
*
* Template Name: Single
*
*/
?>
<?php get_header(); ?>
<?php 
	$post_data = get_post($post); 
	$post_meta = get_post_meta($post_data->ID);
?>
<div class="title_holder">
	<h2 class="title js-scroll-noticias"><?php echo $post_data->post_name; ?></h2 class="title">
	<div id="single-header">
		<div id="feed-date"><?php echo get_the_date('d.m.y'); ?></div>
		<div id="feed-author"><?php echo get_formated_author($post_data->post_author); ?></div>		
	</div>
</div>

<div id="single-feed">	
			<div id="feed-block" class="">
				
				<div id="feed-image">
					<?php
						if (has_post_thumbnail()) {
							$attr = array(
								'src'	=> $src,
								'class'	=> "attachment-$size",
								'alt'	=> trim(strip_tags( $attachment->post_excerpt )),
								'title'	=> trim(strip_tags( $attachment->post_title ))
							);
							get_the_post_thumbnail( $post_data->ID, $attr);
						} else {
							$src = wp_get_attachment_image_src($post_meta['post-image_type'][0]);
							?>
							<img src="<?php echo $src[0];?>" />
						<?php }
					?>
				</div>
				<div id="feed-info">
					<div id="single-content"><?php echo $post_data->post_content; ?></div>
				</div>
			</div><!-- end of feed block -->

</div><!-- end of feed -->

<?php get_footer(); ?>