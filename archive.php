<?php get_header(); ?>

<div class="jumbotron clearfix" id="inhoud">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12">
                <h1>Nieuws</h1>
                <div class="row">        
					<?php
                    $nieuwsberichten = array('posts_per_page' => -1, 'post_type' => 'post');
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
    </div>
</div>

<?php get_footer(); ?>