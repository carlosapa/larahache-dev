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
							<pre><?php //print_r($agenda_meta)?></pre>
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
						</div>
						<div id="feed-info">
							<div id="feed-header">
								<div id="feed-title"><?php echo $feed_post[$i]->post_title; ?></div>
								<div id="feed-date"><?php echo get_the_formated_date($feed_post[$i]->ID); ?></div>
								<div id="feed-author"><?php echo get_formated_author($feed_post[$i]->post_author); ?></div>		
							</div>
							<div id="feed-content"><?php echo content_to($feed_post[$i]->ID); ?></div>
							<!--<div id="feed-readmore"><a href="<?php //echo $feed_post[$i]->guid; ?>" target="_self">Ver más de este post</a></div>-->
						</div>
					</div><!-- end of feed block -->

					<?php 
					$i++;
				}
			}
			wp_reset_postdata();
		?>
		</div><!-- end of feed -->
	</div><!-- end of main -->
	<div id="home-sidebar">
		<div class="title_holder">
			<h2 class="title js-scroll-twitter">Twitter</h2 class="title">
		</div>
		<div id="twitter-feed">
			<a class="twitter-timeline" width="300" height="600" border-color="#f5f5f5"  data-chrome="noborders" href="https://twitter.com/larahache" lang="es" data-widget-id="456199975441924096">Tweets por @larahache</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<div class="title_holder">
			<h2 class="title js-scroll-twitter">Instragram</h2 class="title">
		</div>
		<div id="instagram-feed">
			<!-- SnapWidget -->
			<iframe src="http://snapwidget.com/in/?u=bGFyYWhlcm5hbmRlemdhcmNpYXxpbnw5MnwzfDN8fG5vfDV8ZmFkZU91dHxvblN0YXJ0fHllcw==&v=22414" title="Instagram Widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:291px; height:291px"></iframe>		
		</div>
	</div>
</div><!-- end of wrapper -->
<!-- SnapWidget -->

<?php get_footer(); ?>