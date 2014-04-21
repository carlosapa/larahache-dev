<?php

?>
<a class="title js-scroll-bio-lara"></a><!-- Anchor for the Bio-Lara part -->

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