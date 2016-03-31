<?php
/**
 *
 *	Template Name: Home Page
 *
 */

get_header(); ?>

	<section class="section cf logo-banner-wrap">
		<div class="logo-banner">
			<img class="logo-block" src="<?php bloginfo('template_directory'); ?>/images/voidcube-anim.gif" alt="T/8">
			<a class="voidlink" title="Enter the void..." href="#start">Enter the void...</a>
		</div>
	</section>
	<section class="section cf home-main">
		<a class="anchor" name="start"></a>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	</section>
	<?php if(get_field('home_sub')) { ?>

	<section class="section cf home-sub">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="cf">
				<?php the_field('home_sub'); ?>
			</article>
		<?php endwhile; ?>
	</section>

	<?php } // end home_sub ?>

	<?php get_template_part( 'partials/featposts' ); ?>

	<section class="section fullgrid cf">
	    <a class="anchor" name="other"></a>
		<?php 
		// Most recent 9 STICKY POSTS ONLY from the Other Things category
		$args = array( 
			'cat'					=> 48, // Other Things cat id
			'ignore_sticky_posts'    => 0,
	        'posts_per_page'         => 12
		);
		$others = new WP_Query( $args );
		
		if($others->have_posts()) : 
		      while($others->have_posts()) : 
		         $others->the_post();
		?>
			<?php get_template_part( 'partials/threerow' ); ?>
		<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
<!--		<a class="more" href="#">View More</a>-->
	</section>

<?php get_footer(); ?>