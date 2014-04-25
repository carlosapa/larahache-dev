<?php
/*
*
* Template Name: Home
*
*/
?>

<?php get_header(); ?>

<?php 
	// Init slider home:
	require_once('slider-index-dev.php'); 
?>


<div id="home_wrapper">
	<div id="home_main">
		<div class="title_holder">
			<h2 class="title js-scroll-agenda">Agenda</h2 class="title">
		</div>

		<div id="agenda-widget">
			<div id="agenda-holder">
			<?php

				$args = array (
					'category_name' => 'calendar', 
					'post_per_page' => '-1', 
					'order'         => 'ASC', 
					'meta_key'		=> 'fecha_acto',
					'orderby' 		=> 'meta_value',
					'nopaging'      => 'true'
				);

				$query_agenda = new WP_Query( $args );
				$i = 0;

				$agenda_post = $query_agenda->posts;
				if ($query_agenda->have_posts()) {
					while ($query_agenda->have_posts()) {
						$query_agenda->the_post();
						$agenda_meta = get_post_meta($agenda_post[$i]->ID);
						?>

						<div id="agenda-block" class="<?php today($agenda_meta['fecha_acto'][0]); ?>" data-day="<?php echo $agenda_meta['fecha_acto'][0]; ?>">
							<div id="agenda-date"><?php format_date_agenda($agenda_meta['fecha_acto'][0]); ?></div>
							<div id="agenda-time"><?php echo $agenda_meta['lugar_acto'][0]; ?></div>
							<!--<div id="agenda-place"><?php //echo $agenda_meta['hora_acto'][0]; ?></div>-->
						</div>

						<?php 
						$i++;
					}
				}
				wp_reset_postdata();
			?>
			<!--<div id="agenda-block-marker">hola</div>-->
			</div>
		</div><!-- end of agenda -->


		<div class="title_holder">
			<h2 class="title js-scroll-noticias">Novedades</h2 class="title">
		</div>
		<div id="post-feed">	
		<?php
			$paged = (get_query_var("page")) ? get_query_var("page") : 1;
			$args = array ('category_name' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5, 'paged' => $paged );	
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
									get_the_post_thumbnail( $feed_post[$i]->ID, 'large' , $attr);
								} else {
									$attr = array(
										'src'	=> $src,
										'class'	=> "attachment-$size",
										'alt'	=> trim(strip_tags( $attachment->post_excerpt )),
										'title'	=> trim(strip_tags( $attachment->post_title ))
									);
									$src = wp_get_attachment_image_src($feed_meta['post-image_type'][0], 'full', $attr);
									?>
									<img src="<?php echo $src[0];?>" />
								<?php }
							?>
							<div class="social-feed">
									<?php 
										$encoded_url = urldecode($feed_post[$i]->guid);
									?>
								<div class="social-btn social-share">
										<img src="<?php bloginfo('template_directory');?>/img/share.png"/>
								</div>	
								<div class="social-btn social-fb">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_url; ?>" target="_blank">
										<img src="<?php bloginfo('template_directory');?>/img/facebooksh.png"/>
									</a>
								</div>
								<div class="social-btn social-mail">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_url; ?>" target="_blank">
										<img src="<?php bloginfo('template_directory');?>/img/mailto.png"/>
									</a>
								</div>
								<div class="social-btn social-twitter">
									<a href="http://twitter.com/home?status=go+to+this+page+<?php echo $encoded_url; ?>" target="_blank">
										<img src="<?php bloginfo('template_directory');?>/img/twittersh.png"/>
									</a>
								</div>
							</div>	
						</div>
						<div id="feed-info">
							<div id="feed-header">
								<div id="feed-title"><?php echo $feed_post[$i]->post_title; ?></div>
								<div id="feed-title-info">
									<div id="feed-date"><?php echo get_the_date('d.m.y'); ?></div>
									<div id="feed-author"><?php echo get_formated_author($feed_post[$i]->post_author); ?></div>	
								</div>	
							</div>
							<div id="feed-content"><?php echo content_to($feed_post[$i]->ID); ?></div>
							<div class="prensa-lee"><a href="<?php echo get_permalink(get_the_id()); ?>" target="_self">Ver más de este post</a></div>
						</div>
					</div><!-- end of feed block -->

					<?php 
					$i++;
				}
			}
			?>
				<div id="pagination">
					<div id="pagination-area">

						<?php 
							$big = 999999999;
							$args = array(
								'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'       => '?page=%#%',
								'total'        => $query_feed->max_num_pages,
								'current'      => max( 1, get_query_var('page') ),
								'show_all'     => False,
								'end_size'     => 1,
								'mid_size'     => 2,
								'prev_next'    => True,
								'prev_text'    => __('« Anteriores'),
								'next_text'    => __('Siguentes »'),
								'type'         => 'plain',
								'add_args'     => False,
								'add_fragment' => '',
								'before_page_number' => '',
								'after_page_number' => ''
							); 
							echo paginate_links($args);
						?>
					</div>
				</div>
		
		<?php
			wp_reset_postdata();
		?>

		</div><!-- end of feed -->
	</div><!-- end of main -->
	
	<?php require_once('sidebar-1.php'); ?> <!-- include sidebar -->

</div><!-- end of wrapper -->
<!-- SnapWidget -->

<?php get_footer(); ?>