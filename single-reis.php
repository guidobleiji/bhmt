<?php get_header(); ?>

<div class="jumbotron clearfix text-center" id="intro">
    <div class="container">
        <div class="row text-center">
			<div class="col-xs-12">
            	<h1><?php echo the_title();?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 center-text">
                <p id="datum-km"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><?php the_field('reis_van'); ?> t/m <?php the_field('reis_tm'); ?> <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> <?php the_field('reis_kilometers'); ?> KM</p>
                
                <?php if(get_field('reis_van_tweede')){
					?>
                    	<p id="datum-km"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><?php the_field('reis_van_tweede'); ?> t/m <?php the_field('reis_tm_tweede'); ?> <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> <?php the_field('reis_kilometers'); ?> KM</p>
                    <?
				};?>
                
				<?php the_field('reis_intro'); ?>
                
                <div class="row" id="galerij">
                <?php
				$galerij = get_field('reis_galerij');				
				if($galerij){
					foreach($galerij as $afbeelding){
						echo '<div class="col-xs-12 col-sm-3 galerij-img"><a href="'.$afbeelding['url'].'" rel="lightbox" style="background-image:url('.$afbeelding['sizes']['medium'].')"></a></div>';
					}
				};
				?>
                </div>
                
                <p><a href="#boeken" class="button button-oranje schaduw">Meteen boeken</a> <a href="#dagplanning" class="button button-wit-border schaduw">Meer informatie</a></p>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron" id="dagplanning">
    <div class="container">
        <div class="row text-center">
			<div class="col-xs-12">
            	<h2>Dagprogramma</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="tijdlijn">        
                    <?php
                    if(get_field('reis_dagprogramma'))
                        {
                        $i = 0;
                        foreach(get_field('reis_dagprogramma') as $dag){
                            $i++;
                            ?>
                            <li>
                                <div class="tijdlijn-badge"><?php echo $i; ?></div>
                                    <div class="tijdlijn-panel">
                                        <div class="tijdlijn-heading">
                                            <h3 class="tijdlijn-title"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> <?php echo ''.$dag['reis_dagprogramma_locatie'].'';?></h3>
                                        </div>
                                        <div class="tijdlijn-body">
                                            <p><?php echo ''.$dag['reis_dagprogramma_activiteit'].'';?></p>
                                        </div>
                                </div>
                            </li>
                            <?
                        }
                    };
                    ?>
                </ul>
            </div>
            <div class="col-xs-12 text-center">
            	<span class="button button-oranje volledig-programma schaduw">Volledig programma <i class="fa fa-caret-down" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron clearfix text-center" id="tarieven">
    <div class="container">
        <div class="row text-center">
			<div class="col-xs-12">
            	<h2>Tarieven</h2>
            </div>
        </div>
        
        <div class="row">
            <?php 
                //Loops through the repeater
            	while (have_rows('reis_motoren')) {
                the_row();
                
                //fetches the post object field. Assumes this is a single value, if they can select more than one you have to do a foreach loop here like the one in the example above
                $motor = get_sub_field('reis_motor');
                if($motor){
                    //Fetch the image field from the carsandtrucks post
                    $motortype = get_the_title($motor->ID);
					$motorfoto = get_field('motor_afbeelding', $motor->ID);
                }
                
                //Echo out the image with the medium size. Change this as you like!
				echo '<div class="col-xs-12 col-sm-6 col-md-3 motor text-center">';
					echo '<img src="'.$motorfoto.'" class="img-responsive center-block" />';
					echo '<h3>'.$motortype.'</h3>';
					echo '<span class="reis-prijs">&euro;'.get_sub_field('reis_prijs').'</span>';
				echo '</div>';              
            }
            ?>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
            	<ul>
                	<?php
					if(get_field('reis_voorwaarden'))
						{
						foreach(get_field('reis_voorwaarden') as $voorwaarde){
							?>
							<li>
								<?php echo ''.$voorwaarde['reis_voorwaarden_icoon'].' '.$voorwaarde['reis_voorwaarden_voorwaarde'].'';?>
							</li>
							<?
						}
					};
					?>
                </ul>            
            </div>
        </div>
    </div>
</div>

<div class="jumbotron" id="boeken">
	<div class="container">
		<div class="row text-center">
			<div class="col-xs-12">
            	<h2>Boeken</h2>
            </div>
            <div class="col-xs-12">
            	<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');?>
            </div>
		</div>
	</div>
</div>

<?php get_footer(); ?>