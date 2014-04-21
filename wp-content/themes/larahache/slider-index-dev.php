<?php ?>
<a class="title js-scroll-bio-lara"></a><!-- Anchor for the Bio-Lara part -->

<ul id="slider-home">

	<li>
		<div id="slider-presentaciones">
			<div class="pull-left-wide">
				<img src="<?php bloginfo('template_directory');?>/img/lara.jpg" alt="bio-img" title="lara-img" />
			</div>
			<div class="pull-right-thin">
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
			</div>
		</div>
	</li>
	
	<li>
		<div id="slider-video">
			<div class="pull-left-half">
				<div id="video-cont">
					<iframe width="600" height="314" src="//www.youtube.com/embed/UrBhw377elc" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="pull-right-half">
				<div id="tiny-gallery">
					
				</div>
			</div>
		</div>
	</li>

	<li>
		<div id="slider-novedades">
			<div class="pull-left-thin">
			</div>
			<div class="pull-right-wide">
			</div>
		</div>
	</li>

</ul>