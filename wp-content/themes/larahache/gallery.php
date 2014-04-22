<?php
/*
*
* Template Name: Gallery
*
*/
?>
<?php get_header(); ?>

<div id="home_wrapper">
	<div class="title_holder">
		<h2 class="title js-scroll-noticias">Galería de imágenes</h2 class="title">
	</div>
	<div id="post-gallery">	
		<div id="post-gallery-holder">	
			<?php    
		        $galleries = get_post_galleries_images($page);
		        ?>
		        <pre><?php print_r($galleries)?></pre>
		    ?>
		</div>	
	</div><!-- end of feed -->
</div>
<?php get_footer(); ?>