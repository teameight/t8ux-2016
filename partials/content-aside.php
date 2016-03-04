<?php
/**
 * The default template for displaying content with an aside?
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
				<h5 class="subheading">service + service</h5>
			</div>
		</header>
		<div class="pcont entry-content">
			<div class="text">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<section class="g cont-wrap">
		<img src="<?php bloginfo('template_directory'); ?>/images/fpo_16x9.png" alt="16x9 Image">
		<div class="imgdesc cf">
			<img src="<?php bloginfo('template_directory'); ?>/images/fpo_4x3.png" alt="4x3 Image">
			<div class="desc">
				<div class="text">
					<?php the_content(); // this would actually be ACF content optionally paired with the image ?>
				</div>
			</div>
		</div>	
		<img src="<?php bloginfo('template_directory'); ?>/images/fpo_4x3.png" alt="4x3 Image"> 
	</section>
</article><!-- #post -->
