window.onload = function () {
	init_wall(); //iniciar muro
	init_scroll_functions(); //scrolleo
	read_more_functions(); //read more en home
	read_more_prensa_functions(); //read more en functions
	center_imgs(); //centering images
	picasa_feed();
	init_slider();
	init_agenda();

	init_auto_scroll_functions();//links scroll

	init_admin_functions(); //esconder categorías...
	console.log('main.js loaded and ready');
};

/* ====================== */

var init_wall = function () {
	var wall = new freewall('#post-gallery-holder');
	var selector = $('.js-wall-item');
	
	wall.reset({
		animate: true,
		gutterY: 10,
	  	gutterX: 'auto'
	});

	wall.fixSize({
		block: selector,
		height: 150, 
		width: 320
	});
	wall.fitWidth();
};

/* ====================== */

var init_slider = function () {
	var slider = $('#slider-home');

	//slider.css('opacity', 0);

	slider.anythingSlider({
		autoPlay: true,
		buildNavigation: false,
		buildStartStop: false,
		expand: true,
		//resizeContents: true,
		buildArrows : true,
		hashTags: false,
		infiniteSlides: true,
	});

	var timer = window.setTimeout(function() {
		slider.animate({
			'opacity': 1
		}, 250);
	}, 500);
};

/* ====================== */

var init_scroll_functions = function() {
	var menu = document.getElementById('header-menu'),
		menu_offset = menu.offsetTop,
		class_offset = 'menu-offset';
		img = document.getElementById('header-img');
		draw_inicio();
	
	//console.log(menu);
	
	window.onscroll = function () { //colocar menu al scrollear
		var window_offset = dw_getScrollOffsets().y;

		if (window_offset < menu_offset) {
			menu.classList.remove('menu-offset');
			img.style.marginBottom = '0px';
		} else if (window_offset >= menu_offset) {
			menu.classList.add('menu-offset');
			img.style.marginBottom = '78px';
		}
		draw_inicio();
	};
};

var draw_inicio = function () {
	var window_offset = dw_getScrollOffsets().y,
		menu = document.getElementById('header-menu'),
		menu_offset = menu.offsetTop, 
		inicio = document.getElementById('inicio');

		if (window_offset < menu_offset) {
			inicio.classList.remove('show-inicio');
		} else if (window_offset >= menu_offset) {
			inicio.classList.add('show-inicio');
		}
};

/* ====================== */

var read_more_prensa_functions = function () {

	var read_more = document.querySelectorAll('.prensa-lee');
	//console.log(read_more);

	for (var i = 0; i < read_more.length; i++) {
		read_more[i].addEventListener('click', function(ev) {
			var parent = ev.target.parentNode;
			var content = parent.querySelector('#prensa-content');

			if (content.classList.contains('open')) {
				content.classList.remove('open');
				ev.target.innerHTML = 'Abrir bloque';
			} else {
				content.classList.add('open');
				ev.target.innerHTML = 'Cerrar bloque';
			}
			


		}, false);
	}


};

/* ====================== */

var read_more_functions = function () {
	var bio = document.getElementById('bio');
	var bio_text = document.querySelector('.height-130');
	var read_more = document.querySelector('.read-more');

	if (read_more != null) {

		read_more.addEventListener('click', function (ev) {
			
			if (ev.target.classList.contains('read-more')) {
				ev.target.classList.toggle('open')
				
				if(!ev.target.classList.contains('open')) {
					bio_text.style.height = '470px';
					ev.target.style.bottom = '0px';
					ev.target.innerHTML = 'Cerrar texto';
				} else {
					bio_text.style.height = '90px';
					ev.target.style.bottom = '120px';
					ev.target.innerHTML = 'Volver a abrirlo';
				}
			}

		}, false);
	}
}

var dw_getScrollOffsets = function () { //funcion sacada de http://www.dyn-web.com/javascript/scroll-distance/
    var doc = document, w = window;
    var x, y, docEl;
    
    if ( typeof w.pageYOffset === 'number' ) {
        x = w.pageXOffset;
        y = w.pageYOffset;
    } else {
        docEl = (doc.compatMode && doc.compatMode === 'CSS1Compat')?
                doc.documentElement: doc.body;
        x = docEl.scrollLeft;
        y = docEl.scrollTop;
    }
    return {x:x, y:y};
};

/* ====================== */
//aquí va en jQuery por el plugin

var init_auto_scroll_functions = function () {
	//iniciar plugin
	$(window)._scrollable();

	var buttons = [
			$('#inicio'),
			$('.js-scrollTo-bio-lara'), 
			$('.js-scrollTo-agenda'), 
			$('.js-scrollTo-noticias')
	],
		anchors = [
			$('#header-img'),
			$('.js-scroll-bio-lara'), 
			$('.js-scroll-agenda'), 
			$('.js-scroll-noticias')
		],
		
		links = $('li[class^=js-scrollTo-]'),
		link_name = 'link-active';
	
	//functions...
	buttons[0].on('click', function(ev) {
		//anima
		$.scrollTo(anchors[0], 400, {offset:0});
	});
	buttons[1].on('click', function(ev) {
		//anima
		$.scrollTo(anchors[1], 400, {offset:-60});
		//gestiona clase
		links.each(function(){
			$(this).removeClass(link_name);
			$(ev.target).addClass(link_name);
		});
	});
	buttons[2].on('click', function(ev) {
		//anima
		$.scrollTo(anchors[2], 400, {offset:-60});
		//gestiona clase
		links.each(function(){
			$(this).removeClass(link_name);
			$(ev.target).addClass(link_name);
		});
	});
	buttons[3].on('click', function(ev) {
		//anima
		$.scrollTo(anchors[3], 400, {offset:-60});
		//gestiona clase
		links.each(function(){
			$(this).removeClass(link_name);
			$(ev.target).addClass(link_name);
		});
	});
};


/* ====================== */


var init_admin_functions = function () {
	var in_cat_1 = document.getElementById('in-category-1'), //calendar
		in_cat_2= document.getElementById('in-category-2'); //posts

	if (document.getElementById('categorychecklist')) {
		hide_block();
		in_cat_1.addEventListener('change', hide_block, false);
		in_cat_2.addEventListener('change', hide_block, false);

		return true;	
	} else {
		return false;
	}
};

var hide_block = function () {
	var in_cat_1 = document.getElementById('in-category-1'), //calendar
		in_cat_2= document.getElementById('in-category-2'), //posts
		in_cat_1_checked = in_cat_1.checked,
		in_cat_2_checked = in_cat_2.checked,
		format_div = document.getElementById('formatdiv');

	if (in_cat_1_checked == true) {
		format_div.style.display = 'none';
	} else {
		format_div.style.display = 'block';
	}
};

//166px tam minimo
/* ====================== */

var center_imgs = function () {
	var box = document.querySelectorAll('#feed-info');
	var offset = 15;

	for (var i = 0; i < box.length; i++) {
		var height = box[i].clientHeight;
		var image = box[i].parentNode.childNodes[1];
		image.style.height = (height-offset) + 'px';
		//console.log(image);
	}
}

/* ====================== */

var picasa_feed = function () {

}

/* ====================== */

var init_agenda = function () {
	
}



















