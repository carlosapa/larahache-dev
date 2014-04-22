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
		<h2 class="gallery_name">Asamblea programática</h2>
		<div id="post-gallery-holder">	
		<?php
		  $CP =  get_the_id();
		?>
		<?php query_posts('p=' . $CP . ''); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();    

		 $args = array(
		   'post_type' => 'attachment',
		   'numberposts' => -1,
		   'orderby'       => 'name',
		   'post_status' => null,
		   'post_parent' => $CP
		   );

		  $attachments = get_posts( $args );
		     if ( $attachments ) {
		        foreach ( $attachments as $attachment ) {
					echo '<li><p>';
		           	echo wp_get_attachment_image( $attachment->ID, array(746,500) );
					echo '</p></li>';
		          }
		     }

		 endwhile; endif; ?>
		</div>	
	</div><!-- end of feed -->
</div>
<?php get_footer(); ?>