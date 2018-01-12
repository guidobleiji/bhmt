<?php
/**
 * Template Name: Homepage
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
    <?php
	$doorkiesblokken = array('posts_per_page' => 6, 'post_type' => 'reis');
	$reizen = new WP_Query($doorkiesblokken);
	if($reizen->have_posts())
	{
		while($reizen->have_posts())
		{
			$reizen->the_post();
			?>
            <a href="<?php the_permalink();?>" class="col-xs-12 col-sm-6 col-md-2 dkb-reis" style="background-image:url(<?php the_field('reis_doorkiesblok_afbeelding'); ?>);">
                <div class="dkb-reis-titel">
                    <h3><?php the_title();?></h3>
                </div>
                <div class="dkb-reis-tekst">
                    <p><?php the_field('reis_doorkiesblok_tekst'); ?></p>
                </div>
            </a>
			<?php
		}
	}
	wp_reset_query();
	?>
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
            <a href="#dkb-reizen" class="col-xs-12 col-sm-6 blok blok-1">
                <p><?php the_field('home_wit_tekst_blok'); ?></p>
            </a>
            <a href="#dkb-reizen" class="hidden-xs col-sm-6 blok blok-2 zw" style="background-image:url(<?php the_field('home_wit_blok_afbeelding'); ?>);">
                <p><?php the_field('home_wit_blok_icoon'); ?></i></p>
            </a>
            <a href="<?php the_field('home_oranje_blok_link'); ?>" target="_blank" class="hidden-xs col-sm-6 blok blok-3" style="background-image:url(<?php the_field('home_oranje_blok_afbeelding'); ?>);">
                <p><?php the_field('home_oranje_blok_icoon'); ?></p>
            </a>
            <a href="<?php the_field('home_oranje_blok_link'); ?>" target="_blank" class="col-xs-12 col-sm-6 blok blok-4">
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
			<?php
            $nieuwsberichten = array('posts_per_page' => 4, 'post_type' => 'post');
            $nieuws = new WP_Query($nieuwsberichten);
            if($nieuws->have_posts())
            {
                while($nieuws->have_posts())
                {
                    $nieuws->the_post();
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="<?php the_permalink();?>" class="nieuwsblok schaduw-2">
                            <div class="nieuwsblok-afbeelding zw" style="background-image:url(<?php the_field('nieuwsbericht_afbeelding'); ?>);">
                                <h3><?php the_field('nieuwsbericht_titel'); ?></h3>
                            </div>
                            <?php the_field('nieuwsbericht_introtekst'); ?>
                        </a>
                    </div>
                    <?php
                }
            }
            wp_reset_query();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
