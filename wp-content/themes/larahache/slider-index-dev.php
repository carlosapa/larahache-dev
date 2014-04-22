<?php ?>
<a class="title js-scroll-bio-lara"></a><!-- Anchor for the Bio-Lara part -->
<div id="featured">
	<div id="slider-home-holder">
		<ul id="slider-home">

			<li>
				<div id="slider-presentaciones" style="height:360px;">
					<div class="pull-left-wide">
						<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="250"/>
						<div id="caption">
							<span id="bio-name" class="bio-data">Lara Hernández García</span>
							<span id="bio-name" class="bio-data">Candidata al Parlamento Europeo por Izquierda Unida</span>
						</div>
					</div>
					<div class="pull-right-thin">
						<div id="bio-text">
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
					</div>
				</div>
			</li>
			
			<li>
				<div id="slider-video" style="height:360px;">
					<div class="pull-left-half">
						<div id="video-cont">
							<iframe width="530" height="370" src="//www.youtube.com/embed/UrBhw377elc" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="pull-right-half">
						<div id="feed-title" class="video">Intervención en la Asamblea de Madrid</div>
						<div id="tiny-gallery">
							<div id="feed-title" class="gallery">Otras imágenes</div>
							<div id="tiny-gallery-images">
								<div style="width:170px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
								<div style="width:90px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
								<div style="width:170px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
								<div style="width:90px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
								<div style="width:170px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
								<div style="width:90px">
									<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" height="100">
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>

			<li>
				<div id="slider-novedades" style="height:360px;">
					<div class="pull-left-thin">
						<div id="feed-title" class="acto">Próximo acto</div>
						<div id="imagen-acto">
							<?php 

							?>
						</div>
					</div>
					<div class="pull-right-wide">
					</div>
				</div>
			</li>

		</ul>
	</div>
	<div id="labels">

	</div>
</div>