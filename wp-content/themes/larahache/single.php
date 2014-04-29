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

<div id="home_wrapper">
	<div id="home_main">
		<div class="title_holder">
			<h2 class="title single"><?php echo $post_data->post_name; ?></h2>
			<div id="single-header">
				<div id="feed-date"><?php echo get_the_date('d.m.y'); ?></div>
				<div id="feed-author"><?php echo get_formated_author($post_data->post_author); ?></div>		
			</div>
		</div>

		<div id="single-feed">	
					<div id="feed-block" class="">
						
						<div id="single-image">
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
									$src = wp_get_attachment_image_src($post_meta['post-image_type'][0], 'large', false);
									?>
									<img src="<?php echo $src[0];?>" />
								<?php }
							?>
						</div>
						<div id="single-info">
							<div id="single-content"><?php echo $post_data->post_content; ?></div>
						</div>
					</div><!-- end of feed block -->

			</div><!-- end of feed -->

				<div class="title_holder">
					<h2 class="title js-scroll-noticias">Leer más posts</h2>
				</div>
				<div id="post-news">	
				<?php
					$paged = (get_query_var("page")) ? get_query_var("page") : 1;
					$args = array ('category_name' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 9, 'paged' => $paged );	
					$query_feed = new WP_Query( $args );
					$i = 0;
					$feed_post = $query_feed->posts;
					if ($query_feed->have_posts()) {
						while ($query_feed->have_posts()) {
							$query_feed->the_post();
							$feed_meta = get_post_meta($feed_post[$i]->ID);
							?>

							<div id="news-block" class="">

								<div id="news-image">
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
									<div class="social-news">
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
								<div id="news-info">
									<div id="news-header">
										<div id="news-title"><?php echo max_words($feed_post[$i]->post_title, 8);?></div>
										<div id="news-title-info">
											<div id="news-date"><?php echo get_the_date('d.m.y'); ?></div>
											<div id="news-author"><?php echo get_formated_author($feed_post[$i]->post_author); ?></div>	
										</div>	
									</div>
									<div id="news-content">
										<?php 
											echo max_words(content_to($feed_post[$i]->ID), 20); 
										?>
									</div>
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

</div> <!-- end of wrapper -->


<?php get_footer(); ?>