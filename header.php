<!doctype html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>Black Hills Motor Tours</title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93264953-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>     
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigatie" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="http://www.blackhillsmotortours.com/wp-content/themes/bhmt/img/black-hills-motor-tours.png" width="141" height="44" alt="Black Hills Motor Tours"></a>
        </div>
        
        <div class="collapse navbar-collapse" id="navigatie">
			<?php wp_nav_menu(array('menu'=> 'hoofdmenu','theme_location'=> 'hoofdmenu','depth'=> 2,'menu_class'=> 'nav navbar-nav navbar-right','fallback_cb'=> 'wp_bootstrap_navwalker::fallback','walker'=> new wp_bootstrap_navwalker())); ?>
        </div>
    </div>
</nav>

<div class="jumbotron hidden-xs" id="slider">
    <?php
    if(get_field('slider')){
        foreach(get_field('slider') as $slide){
            echo '<div class="slide" style="background-image:url('.$slide['slide'].');"></div>';
        }
    }
	elseif(get_field('slider', 'Options')){
        foreach(get_field('slider', 'Options') as $slide){
            echo '<div class="slide" style="background-image:url('.$slide['slide'].');"></div>';
        }
    };
    ?>
</div>