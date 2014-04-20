<?php
/*
*
* Template Name: Home
*
*/
?>
<?php get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=311842455633720";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

	<a class="title js-scroll-bio-lara"></a>

<div id="featured">
	<div id="bio">
		<div id="bio-img">
			<ul id="slider-home">
				<li>
					<div class="slide-1">
						<img src="<?php bloginfo('template_directory');?>/img/lara-fotos/_MG_6330.jpg" alt="bio-img" title="lara-img" />

					</div>
				</li>
				<li>
					<div class="slide-2">
						<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" />
					</div>				
				</li>
				<li>
					<div class="slide-3">
						<img src="<?php bloginfo('template_directory');?>/img/lara-fotos/mani-2.jpg" alt="bio-img" title="lara-img" />
					</div>
				</li>
				<li>
					<div class="slide-4">
						<img src="<?php bloginfo('template_directory');?>/img/lara-fotos/_MG_6257.png" alt="bio-img" title="lara-img" />
					</div>				
				</li>
			</ul>	
		</div>
		<div id="bio-text">

			<span id="bio-name" class="bio-data">Lara Hernández García</span>
			<span id="bio-name" class="bio-data">Candidata al Parlamento Europeo por Izquierda Unida</span>
			<!--<span id="bio-name" class="bio-data">Otro dato</span>
			<span id="bio-name" class="bio-data">Otro dato más</span>-->
			<div class="data height-130">
				<?php
						$text = get_page(get_the_ID());
						$content = apply_filters('the_content', $text->post_content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
				?>
			</div>
			<div class="read-more open">Seguir leyendo</div>
		</div>
	</div><!-- end of bio -->
</div>
	<!--<div id="twitter-feed">
		<p>Últimos twetts</p>
	</div>-->

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
			<h2 class="title js-scroll-noticias">Noveddes</h2 class="title">
		</div>
		<div id="post-feed">	
			<div id="feed-block" class="video">
				<div id="feed-title" class="video">Intervención en la Asamblea de Madrid</div>
				<div id="video-cont">
					<iframe width="600" height="314" src="//www.youtube.com/embed/UrBhw377elc" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
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
			<a class="twitter-timeline" width="268" height="600" border-color="#f5f5f5"  data-chrome="noborders" href="https://twitter.com/larahache" lang="es" data-widget-id="456199975441924096">Tweets por @larahache</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<!--<div class="title_holder">
			<h2 class="title js-scroll-facebook">Facebook</h2 class="title">
		</div>
		<div id="facebook-feed">
			<div class="fb-post" data-href="https://www.facebook.com/lara.hernandez.77?fref=ts" data-width="268"></div>
		</div>-->

	</div>
</div><!-- end of wrapper -->


<?php get_footer(); ?>