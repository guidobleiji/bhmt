<?php get_header(); ?>

<div class="jumbotron clearfix" id="inhoud">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12">
                <h1><?php the_field('nieuwsbericht_titel'); ?></h1>
                <?php the_field('nieuwsbericht_tekst'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>