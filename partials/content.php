<?php
/**
 * The default template for displaying content
 *
 * Used for singles and maybe pages.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="phead cf">
		<header class="article-header tcrd">
			<div class="cf">
				<h1><?php the_title(); ?></h1>
				<?php if( get_field('subtitle') ): ?>
				<h5 class="subheading"><?php the_field('subtitle'); ?></h5>
				<?php endif; ?>
			</div>
		</header>
		<div class="pcont entry-content">
			<div class="text">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php if( get_field('images') ): ?>
	<section class="section cont-wrap">
		<?php get_template_part( 'partials/postimages' ); ?>
	</section>
	<?php endif; ?>
</article><!-- #post -->
