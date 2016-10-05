<?php
/**
 *
 *	Template Name: Home Page
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="section cf logo-banner-wrap">
		<div class="logo-banner">
			<img class="logo-block" src="<?php bloginfo('template_directory'); ?>/images/micro-block-01.svg" alt="T/8">
		</div>
			<article>
				<?php the_content(); ?>
			</article>
		<a class="voidlink" title="Enter the void..." href="#featured"><img src="<?php bloginfo('template_directory'); ?>/images/void-crystal.gif" alt="T/8"></a>
	</section>

	<?php get_template_part( 'partials/featposts' ); ?>

		<section class="section cf next-page-cta">
			<a class="anchor" name="start"></a>
			<article class="cf">
				<h5>Learn more about our <a href="<?php echo home_url('/process/'); ?>">process. <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
			</article>
		</section>

<?php endwhile; ?>

<?php get_footer(); ?>