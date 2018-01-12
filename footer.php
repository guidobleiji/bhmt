<div class="jumbotron clearfix text-center np">
	<a href="<?php echo the_permalink(135);?>" class="col-xs-12" id="slogan">
    	<strong>Maak een motorreis door de USA!</strong> Neem contact met ons op voor meer informatie <i class="fa fa-arrow-right" aria-hidden="true"></i>
    </a>
</div>

<div class="jumbotron clearfix" id="footer">
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 col-sm-6 col-md-3">
            	<h4>Navigatie</h4>
				<?php wp_nav_menu(array('menu'=> 'hoofdmenu','theme_location'=> 'hoofdmenu','depth'=> 1));?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
            	<h4>Reizen naar de USA</h4>
                <ul>
                <?php
				$reizenArray = array('posts_per_page' => -1, 'post_type' => 'reis', 'order' => 'ASC');
				$reizen = new WP_Query($reizenArray);
				if($reizen->have_posts())
				{
					while($reizen->have_posts())
					{
						$reizen->the_post();
						echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
					}
				}
				wp_reset_query();
				?>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
            	<h4>Nieuws & social media</h4>
                <ul>
                <?php
				$reizenArray = array('posts_per_page' => 3, 'post_type' => 'post', 'order' => 'DESC');
				$reizen = new WP_Query($reizenArray);
				if($reizen->have_posts())
				{
					while($reizen->have_posts())
					{
						$reizen->the_post();
						echo '<li><a href="'.get_permalink().'"><i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i> '.get_the_title().'</a></li>';
					}
				}
				wp_reset_query();
				?>
				</ul>
                <ul id="social-media">
                    <li><a href="http://fb.com/BlackHillsMotorTours" target="_blank"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i> fb.com/BlackHillsMotorTours</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
            	<h4>Black Hills Motor Tours</h4>
                <ul>
                	<li><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> Horstweg 2</li>
                    <li><i class="fa fa-map fa-fw" aria-hidden="true"></i> 7371 BP, Loenen</li>
                    <li><a href="tel:06 54 21 75 70"><i class="fa fa-phone fa-fw" aria-hidden="true"></i> 06 54 21 75 70</a></li>
                    <li><a href="mailto:info@blackhillsmotortours.com"><i class="fa fa-envelope" aria-hidden="true"></i> info@blackhillsmotortours.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>