<?php get_header(); ?>

<div class="jumbotron clearfix" id="inhoud">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12 col-sm-9 mh content">
                <h1><?php the_field('pagina_titel'); ?></h1>
                <?php the_field('pagina_inhoud'); ?>
            </div>
            
            <div class="hidden-xs col-sm-3 mh zijbalk schaduw">
            	<h2><?php the_field('zijbalk_blok_titel', 'Options');?></h2>
                <?php the_field('zijbalk_blok_tekst', 'Options');?>
                <p><a href="http://www.blackhillsmotortours.com/wp-content/uploads/2017/11/BHMT-Folder2018-web.pdf" class="button button-oranje"b target="_blank"><i class="fa <?php the_field('zijbalk_blok_link_icoon', 'Options');?> fa-fw" aria-hidden="true"></i> <?php the_field('zijbalk_blok_link_tekst', 'Options');?></a></p>
                
                <div class="divider"></div>
                
                <?php
				$nieuwsberichten = array('posts_per_page' => 1, 'post_type' => 'post', 'order' => 'DESC');
				$nieuws = new WP_Query($nieuwsberichten);
				if($nieuws->have_posts())
				{
					while($nieuws->have_posts())
					{
						$nieuws->the_post();
						?>
						<h2><?php the_field('nieuwsbericht_titel'); ?></h2>
						<p><?php the_field('nieuwsbericht_introtekst'); ?></p>
                        <p><a href="<?php the_permalink();?>" class="button button-grijs"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i> Lees nieuwsbericht</a></p>
						<?php
					}
				}
				wp_reset_query();
				?>

                <div class="divider"></div>
                
                <h2>Direct contact</h2>
                <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]');?>
            </div>
        </div>
    </div>
</div>

<?php
if(is_page('129')){
	?>
<div class="jumbotron" id="boeken">
	<div class="container">
		<div class="row text-center">
			<div class="col-xs-12">
            	<h2>Boeken</h2>
            </div>
            <div class="col-xs-12">
            	<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="32"]');?>
            </div>
		</div>
	</div>
</div>
    <?
};?>

<?php get_footer(); ?>