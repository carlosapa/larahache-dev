<?php
/*
*
* Template Name: Gallery
*
*/
?>
<?php 

get_header(); 
$gallery = get_gallery_from_post($page->ID);

?>

<div id="home_wrapper">
	<div class="title_holder">
		<h2 class="title js-scroll-noticias">Galería de imágenes</h2 class="title">
	</div>
	<div id="post-gallery">	
		<div id="post-gallery-holder">	
		<?php

			for ($i = 0; $i < count($gallery); $i++) {
				if (gettype($gallery[$i]) !== 'array') {
					//sacamos un div con el nombre de la galería
					?>
						<div class="gallery-images gallery-name">
							<span><?php echo $gallery[$i]; ?></span>
						</div>
					<?php
				} else {
					//rehacemos un array con las imágenes
					for ($j = 0; $j < count($gallery[$i]); $j++) {
						$img_url_tiny = wp_get_attachment_image_src( $gallery[$i][$j], 'medium', false);
						$img_url_big = wp_get_attachment_image_src( $gallery[$i][$j], 'large', false);
						//pintamos la imagen
						?>

						<div class="gallery-images">
							<a id="single_image" class="zoom-in" href="<?php echo $img_url_big[0]; ?>">
								<img src="<?php echo $img_url_tiny[0]; ?>" alt="gallery-image" />
							</a>
						</div>

						<?php
					}
				}
			}
		
		?>
		<!--<pre><?php print_r($gallery)?></pre>-->
		</div>	

	</div><!-- end of feed -->
	<script type="text/javascript">
	</script>
</div>

<?php get_footer(); ?>