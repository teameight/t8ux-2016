<?php
/**
 * The default template for displaying content based on a gallery of images
 *
 * Used for singles and maybe pages.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="g cont-wrap">
		<h2 class="ghead"><span><?php the_title(); ?></span></h2>
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
