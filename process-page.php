<?php
/**
 *
 *	Template Name: Process Page
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="section introduction">
			<article>
				<?php the_content(); ?>
			</article>
		<a class="downarrow" href="#strategy">&darr;</a>
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
						echo '<a class="downarrow" href="#'. $next .'">&darr;</a>';
					}
				?>
			</section>

	<?php
			}
		} 
	?>

<?php endwhile; ?>


<?php get_footer(); ?>