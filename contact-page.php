<?php
/**
 *
 *	Template Name: Contact
 *
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<section class="section cf contact">
	    <div class="wrap">
		    <div class="say-hay entry-content">
		    	<?php the_content(); ?>
		    	<?php 
					$location = get_field('map');

					if( !empty($location) ):
				?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				<?php endif; ?>
		    </div>
		    <div class="contact-form">
		    	<h4><a href="mailto:communicate@team-eight.com">communicate@team-eight.com</a></h4>
		    	<?php echo do_shortcode('[gravityform id=2 title=false description=false]'); ?>
		    </div>
		</div>
	</section>
<?php endwhile; ?>


<?php get_footer(); ?>