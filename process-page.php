<?php
/**
 *
 *	Template Name: Process Page
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="section intro">
			<article>
				<?php the_content(); ?>
			</article>
		<a class="downarrow" href="#strategy">&darr;</a>
	</section>

	<?php
		$processlist = array(
			'strategy', 
			'research', 
			'info-arch', 
			'design', 
			'build', 
			'iterate', 
		);

		foreach ($processlist as $section) {
			if(get_field($section)) { ?>

			<section class="section process-step <?php echo $section; ?>">
				<a class="anchor" name="<?php echo $section; ?>"></a>
				<div class="step-wrap">
					<img src="http://placekitten.com/800/800" />
					<article>
						<?php the_field($section); ?>
					</article>
				</div>
			</section>

	<?php
			}
		} 
	?>

<?php endwhile; ?>


<?php get_footer(); ?>