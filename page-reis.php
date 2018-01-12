<?php
/**
 * Template Name: Reis
*/
 get_header(); ?>

<div class="jumbotron clearfix text-center" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 center-text">
                <img src="http://www.blackhillsmotortours.com/wp-content/themes/bhmt/img/intro.jpg" class="img-responsive center-block" id="intro-afbeelding" width="283" height="157" alt="Black Hills Motor Tours" />
                <?php the_field('home_intro'); ?>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron clearfix" id="dkb-reizen">
    <div class="col-xs-12 col-sm-5ths dkb-reis zw">
    
    </div>
    <div class="col-xs-12 col-sm-5ths dkb-reis zw">
    
    </div>
    <div class="col-xs-12 col-sm-5ths dkb-reis zw">
    
    </div>
    <div class="col-xs-12 col-sm-5ths dkb-reis zw">
    
    </div>
    <div class="col-xs-12 col-sm-5ths dkb-reis zw">
    
    </div>
</div>

<div class="jumbotron clearfix text-center" id="over">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h2><?php the_field('home_over_titel'); ?></h2>
                <?php the_field('home_over'); ?>
                <p><a href="<?php the_field('home_oranje_button_link'); ?>" class="button button-oranje schaduw"><?php the_field('home_oranje_button'); ?></a> <a href="<?php the_field('home_witte_button_link'); ?>" class="button button-wit schaduw"><?php the_field('home_witte_button'); ?></a></p>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron clearfix text-center" id="blokken">
	<div class="container">
    	<div class="schaduw-2">
            <a href="<?php the_field('home_wit_tekst_link'); ?>" class="col-xs-12 col-sm-6 blok blok-1">
                <p><?php the_field('home_wit_tekst_blok'); ?></p>
            </a>
            <a href="<?php the_field('home_wit_tekst_link'); ?>" class="hidden-xs col-sm-6 blok blok-2 zw" style="background-image:url(<?php the_field('home_wit_blok_afbeelding'); ?>);">
                <p><?php the_field('home_wit_blok_icoon'); ?></i></p>
            </a>
            <a href="<?php the_field('home_oranje_tekst_link'); ?>" class="hidden-xs col-sm-6 blok blok-3" style="background-image:url(<?php the_field('home_oranje_blok_afbeelding'); ?>);">
                <p><?php the_field('home_oranje_blok_icoon'); ?></p>
            </a>
            <a href="<?php the_field('home_oranje_tekst_link'); ?>" class="col-xs-12 col-sm-6 blok blok-4">
                <p><?php the_field('home_oranje_blok_tekst'); ?></p>
            </a>
        </div>
    </div>
</div>

<div class="jumbotron clearfix" id="nieuws">
	<div class="container">
    	<div class="row text-center">
			<h2>Recent nieuws</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <div class="nieuwsblok schaduw-2">
                    <div class="nieuwsblok-afbeelding zw">
                        <h3>Nieuwsbericht</h3>
                    </div>
                    <p>Op YouTube kunt u een aantal filmpjes bewonderen van een tiental deelnemers die op hun Liberator Harley's een trip hebben gemaakt naar de Sturgis Bikeweek en hebben meegereden in de 110th Anniversary parade in Milwaukee ... <a href="#">Lees meer <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="nieuwsblok schaduw-2">
                    <div class="nieuwsblok-afbeelding zw">
                        <h3>Nieuwsbericht</h3>
                    </div>
                    <p>Op YouTube kunt u een aantal filmpjes bewonderen van een tiental deelnemers die op hun Liberator Harley's een trip hebben gemaakt naar de Sturgis Bikeweek en hebben meegereden in de 110th Anniversary parade in Milwaukee ... <a href="#">Lees meer <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="nieuwsblok schaduw-2">
                    <div class="nieuwsblok-afbeelding zw">
                        <h3>Nieuwsbericht</h3>
                    </div>
                    <p>Op YouTube kunt u een aantal filmpjes bewonderen van een tiental deelnemers die op hun Liberator Harley's een trip hebben gemaakt naar de Sturgis Bikeweek en hebben meegereden in de 110th Anniversary parade in Milwaukee ... <a href="#">Lees meer <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="nieuwsblok schaduw-2">
                    <div class="nieuwsblok-afbeelding zw">
                        <h3>Nieuwsbericht</h3>
                    </div>
                    <p>Op YouTube kunt u een aantal filmpjes bewonderen van een tiental deelnemers die op hun Liberator Harley's een trip hebben gemaakt naar de Sturgis Bikeweek en hebben meegereden in de 110th Anniversary parade in Milwaukee ... <a href="#">Lees meer <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
