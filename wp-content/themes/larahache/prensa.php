<?php
/*
*
* Template Name: Prensa
*
*/
?>
<?php get_header(); ?>
<div id="home_wrapper">
	<div class="title_holder">
		<h2 class="title js-scroll-noticias">Prensa</h2 class="title">
	</div>
	<div id="post-prensa">	
	<?php

		$args = array (
			'category_name' => 'articulo_medio', 
			'orderby' => 'meta_value_num', 
			'meta_key' => 'article_date', 
			'order' => 'DESC', 
			'post_per_page' => '-1',
			'nopaging'      => 'true'
		);
		
		$query_prensa = new WP_Query( $args );
		$i = 0;
		$prensa_post = $query_prensa->posts;

		function get_prensa_date($string) {
			//string is 20140128
			$year = substr($string, 0, 4);
			$month = substr($string, 4, 2);
			$day = substr($string, 6, 2);
			$formated_date = $day . '.' . $month . '.' . $year;
			return $formated_date;
		}

		if ($query_prensa->have_posts()) {
			while ($query_prensa->have_posts()) {
				$query_prensa->the_post();
				$prensa_meta = get_post_meta($prensa_post[$i]->ID);
				?>

				<div id="prensa-block" class="">
					<div id="prensa-info">
						<div id="prensa-header">
							<div id="prensa-title"><?php echo $prensa_post[$i]->post_title; ?></div>
							<div id="prensa-title-lat">
								<div id="prensa-date"><?php echo get_prensa_date($prensa_meta['article_date'][0]) ?></div>
								<div id="prensa-date"><?php echo $prensa_meta['article_author'][0] ?></div>	
								<div id="prensa-media"><?php echo $prensa_meta['article_media'][0] ?></div>		
							</div>
						</div>
						<?php 
						if ($prensa_meta['article_subtitle'][0] !== "") {
							?><div id="prensa-subtitle"><?php echo $prensa_meta['article_subtitle'][0] ?></div><?php
						}
						?>
						<div id="prensa-content"><?php echo content_to($prensa_post[$i]->ID); ?></div>
						<div class="prensa-lee">Seguir leyendo</div>
						<div id="prensa-readmore"><a href="<?php echo $prensa_meta['article_link'][0] ?>" target="_blank">Ver link original en <?php echo $prensa_meta['article_media'][0] ?> </a></div>


					</div>
				</div><!-- end of feed block -->

				<?php 
				$i++;
			}
		}
		wp_reset_postdata();
	?>
	</div><!-- end of feed -->
</div>

<?php get_footer(); ?>