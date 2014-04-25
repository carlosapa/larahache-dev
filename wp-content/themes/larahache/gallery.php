<?php
/*
*
* Template Name: Gallery
*
*/
?>
<?php get_header(); ?>
<?php 
	$page = the_post();
?>


<div id="home_wrapper">
	<div class="title_holder">
		<h2 class="title js-scroll-noticias">Galería de imágenes</h2 class="title">
	</div>
	<div id="post-gallery">	
		<h2 class="gallery_name">Asamblea programática</h2>
		<div id="post-gallery-holder">	
		<?php
			$galleries = get_post_galleries_images($page->ID, 'large');
			?><pre><?php print_r($galleries)?></pre>
		<?php

		?>
		</div>	
	</div><!-- end of feed -->
	<script type="text/javascript">

	</script>
</div>

<?php get_footer(); ?>