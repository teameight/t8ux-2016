<?php
/**
 *
 *	Template Name: Process Page
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="section introduction">
			<article class="pcont entry-content wrap">
				<?php the_content(); ?>
			</article>
		<a class="downarrow" href="#strategy"><svg class="downarrow-icon"><use xlink:href="#arrow-icon"></use></svg></a>
	</section>

	<?php
		$processlist = 	new CachingIterator(
			new ArrayIterator(
				array(
					'strategy',
					'research',
					'info-arch',
					'design',
					'build',
					'iterate',
				)
			)
		);


		foreach ($processlist as $section) {

			$image = $section.'_image';

			if(get_field($section)) { ?>

			<section class="section process-step <?php echo $section; ?>">
				<a class="anchor" name="<?php echo $section; ?>"></a>
				<div class="step-wrap">
					<?php

					$image = get_field($image);

					if( !empty($image) ): ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					<?php endif; ?>
					<article>
						<?php the_field($section); ?>
					</article>


				</div>
				<?php
					if($processlist->hasNext()) {
						$next = $processlist->getInnerIterator()->current();
						echo '<a class="downarrow" href="#'. $next .'"><svg class="downarrow-icon"><use xlink:href="#arrow-icon"></use></svg></a>';
					} else {
						echo '<a class="downarrow" href="#start"><svg class="downarrow-icon"><use xlink:href="#arrow-icon"></use></svg></a>';
					}
				?>
			</section>

	<?php
			}
		}
	?>

		<section class="section cf next-page-cta">
			<a class="anchor" name="start"></a>
			<article class="cf">
				<h5>Meet the <a href="<?php echo home_url('/about/'); ?>">makers. <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
			</article>
		</section>

<?php endwhile; ?>


<?php get_footer(); ?>