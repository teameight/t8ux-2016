<?php
/**
 *
 *	Template Name: Home Page
 *
 */

get_header(); ?>

	<section class="section cf logo-banner-wrap">
		<div class="logo-banner">
			<img class="logo-block" src="<?php bloginfo('template_directory'); ?>/images/micro-block-01.svg" alt="T/8">
		</div>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
		<a class="voidlink" title="Enter the void..." href="#featured"><img src="<?php bloginfo('template_directory'); ?>/images/void-crystal.gif" alt="T/8"></a>
	</section>

	<?php get_template_part( 'partials/featposts' ); ?>

	<?php if(get_field('home_sub')) { ?>

	<section class="section cf next-page-cta">
		<a class="anchor" name="start"></a>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="cf">
				<?php the_field('home_sub'); ?>
			</article>
		<?php endwhile; ?>
	</section>

	<?php } // end home_sub ?>


<?php get_footer(); ?>