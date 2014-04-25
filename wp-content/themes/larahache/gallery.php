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
do. url parse -> button
<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank">
 Share on Facebook
</a>

<a href="http://twitter.com/home?status=go+to+this+page+http://www.example.com/%23/page10" target="_blank">
<br/>
Parsear esto -> Share on Twitter
</a>
	</div><!-- end of feed -->
	<script type="text/javascript">

	</script>
</div>

<?php get_footer(); ?>