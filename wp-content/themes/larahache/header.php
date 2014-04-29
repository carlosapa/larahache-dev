<!DOCTYPE html <?php language_attributes(); ?>>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title( '| ', true, 'right' ); ?>Larahache - LOCAL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory' );?>/img/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/css/main.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/js/vendor/lightbox.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/css/anythingslider.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/css/animate.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' );?>/css/jquery.fancybox.css" type="text/css" media="screen" />

   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php bloginfo(' + template_directory + ' );?>/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src=" http://code.jquery.com/jquery-migrate-1.0.0.min.js"></script>
    <script src="<?php bloginfo('template_directory' );?>/js/vendor/jquery.anythingslider.min.js"></script>
    <script src="<?php bloginfo('template_directory' );?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body <?php body_class(); ?>>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<?php 
function link_process ($str) {
    if (is_page('74') || is_page('83') || is_page('194') || is_single()) {
        echo '<a href="' . get_home_url() . '">' . $str . '</a>';
    } else {
        echo $str;
    }
} 
?>

    <div id="header">
        <div id="head-line"></div>
        <a style="text-decoration:none;" href="<?php echo home_url() ?>">
            <div id="header-img"></div> 
            <div id="header-name">
                <span class="name">Lara <br/>Hernández García</span>
                <span class="sub-name">Candidata al Parlamento Europeo por IU</span>
            </div> 
        </a>
        <div id="header-menu"> 
            <div id="header-menu-block"> 
                <ul id="menu">
                    <li id="inicio"><img src="<?php bloginfo('template_directory');?>/img/home.png" width="26px"/></li>
                    <li class="js-scrollTo-bio-lara"><?php link_process('Quién soy'); ?></li>
                    <li class="js-scrollTo-agenda"><?php link_process('Agenda'); ?></li>
                    <li class="js-scrollTo-noticias"><?php link_process('Novedades'); ?></li>
                    <li><a href="?page_id=74">Prensa</a></li>
                    <li><a href="?page_id=194">Mis Publicaciones</a></li>
                    <li><a href="?page_id=83">Galería</a></li>
                </ul>
                <ul id="social-menu">
                    <li id="inicio"><a href="https://www.facebook.com/lara.hernandez.77?fref=ts" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/facebook.png" width="26px"/></a></li>
                    <li id="inicio"><a href="https://twitter.com/larahache" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/twitter.png" width="26px"/></a></li>
                    <li id="inicio"><a href="http://instagram.com/larahernandezgarcia#" target="_blank"><img src="<?php bloginfo('template_directory');?>/img/instagram.png" width="26px"/></a></li>

                </ul>
            </div>
        </div>
    </div><!-- end of header -->