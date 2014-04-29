<?php
//get informations of template
	$args = array(
		'post_type' => 'slider',
	);
	$query = new WP_Query( $args );
	$meta = get_post_meta($query->posts[0]->ID);
	$sliders = array(
		'slider-1' => array(
			'post' => $query->posts[2],
			'meta' => get_post_meta($query->posts[2]->ID),
		),
		'slider-2' => array(
			'post' => $query->posts[1],
			'meta' => get_post_meta($query->posts[1]->ID),
		),
		'slider-3' => array(
			'post' => $query->posts[0],
			'meta' => get_post_meta($query->posts[0]->ID)
		)
	);
?>

<a class="title js-scroll-bio-lara"></a><!-- Anchor for the Bio-Lara part -->
<div id="featured">
	<div id="slider-home-holder">
		<ul id="slider-home">
			<li>
				<div id="slider-presentaciones" style="height:360px;">
					<div class="pull-left-wide">
						
						<div class="img-block">
							<?php 
								//img load
								$img_attr = wp_get_attachment_image_src($sliders['slider-1']['meta']['gallery'][0], 'full', 0);
							?>
							<img src="<?php echo $img_attr[0];?>" alt="bio-img" title="lara-img"/>
						</div>	
						<div id="caption">
							<span id="bio-name" class="bio-data"><?php echo $sliders['slider-1']['meta']['nombre-lara'][0]; ?></span>
							<span id="bio-name" class="bio-data"><?php echo $sliders['slider-1']['meta']['subnombre-lara'][0]; ?></span>
						</div>
					</div>
					<div class="pull-right-thin">
						<div id="bio-text">
							<div class="data height-130">
								<?php
										$text = $sliders['slider-1']['meta']['texto-presentacion'][0];
										$content = apply_filters('the_content', $text);
										$content = str_replace(']]>', ']]&gt;', $content);
										echo $content;
								?>
							</div>
							<div class="read-more open">Seguir leyendo</div>

						</div>
					</div>
				</div>
			</li>
			
			<li>
				<div id="slider-video" style="height:360px;">
					<div class="pull-left-half">
						<div id="video-cont">
							<iframe width="530" height="355" src="<?php echo $sliders['slider-2']['meta']['video-link'][0]; ?>" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="pull-right-half">
						<div id="feed-block-title" class="video pointing-left"><span><?php echo $sliders['slider-2']['meta']['video-nombre'][0]; ?></span></div>
						<div id="tiny-gallery">
							<div id="feed-block-title" class="gallery pointing-down">Otras imágenes</div>
							<div id="tiny-gallery-images">
								<?php
									//feed gallery from easy gallery
									$gallery_slider_2  = $sliders['slider-2']['meta']['_easy_image_gallery'][0];
									$gallery_image_ids = explode(",", $gallery_slider_2);
									for ($i = 0; $i < count($gallery_image_ids); $i++) {
										$image_data[$i] = wp_get_attachment_image_src($gallery_image_ids[$i], 'medium', 0);
										$url[$i]        = $image_data[$i][0]; 
										?>

										<div id="tiny-image">
											<img src="<?php echo $url[$i]?>" alt="bio-img" title="lara-img" height="80">
										</div>

										<?php
									}							
								?>

								<a href="?page_id=83"><div id="tiny-image" class="ver-mas">
									<span>Ver más</span>
								</div></a>

							</div>
							<script type="text/javascript">

							</script>
						</div>
					</div>
				</div>
			</li>

			<li>
				<div id="slider-novedades" style="height:360px;">
					<div class="pull-left-thin">
						<div id="feed-block-title" class="acto">Próximo acto</div>
						<div id="imagen-acto">
							<?php 
								//tomo objeto post y deserializo el id del post
								$post_object = $sliders['slider-3']['meta']['proximo-acto'][0];
								$post_object_ser = unserialize($post_object);

								//tomo los datos meta del post y los atributos de la imagen
								$post = get_post($post_object_ser[0]);
								$meta = get_post_meta($post_object_ser[0]);
								$img_attr = wp_get_attachment_image_src($meta['post-image_type'][0], 'full', 0);
								//la url de la imagen es siempre el 0
								$img_src = $img_attr[0];
							?>
							<img src="<?php echo $img_src;?>"/>
						</div>
					</div>
					<div class="pull-right-wide">

						<div id="feed-info" class="slider">
							<div id="feed-header">
								<div id="feed-title"><?php echo get_the_title($post->ID); ?></div>
								<div id="feed-title-info">
									<div id="feed-date">
										<?php 
											//es la única manera de tomar la fecha formateada de una fecha
											echo mysql2date('d.m.y', $post->post_date); 
										?>
									</div>
									<div id="feed-author"><?php echo get_formated_author($post->post_author); ?></div>	
								</div>	
							</div>
							<div id="feed-content"><?php echo content_to($post->ID); ?></div>
							<div id="feed-readmore"><a href="<?php echo get_permalink($post->ID); ?>" target="_self">Ver más de este post</a></div>
						</div>

					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<pre>
	<?php 


	//print_r($meta);

	?>
</pre>
<script type="text/javascript">
	var slider = $('#slider-home');
	slider.anythingSlider({
		autoPlay: true,
		buildNavigation: true,
		buildStartStop: false,
		expand: true,
		/*resizeContents: false,*/
		buildArrows : true,
		hashTags: false,
		infiniteSlides: false,
		delay: 6000
	});

	slider.on('slide_begin', function(e, slider) {
		if (slider.currentPage == 1) {
			open_intro_text('#slider-home-holder', 381);
		}
	});
</script>