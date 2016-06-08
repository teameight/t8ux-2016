<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 *
 */

get_header(); ?>

	<section class="section cf cattag-dir">
		<?php if ( have_posts() ) : ?>				
			<article>
				<section class="sechead">
					<header>
						<h1 class="h4 alt"><?php 
                	if ( is_tag() ) :
						single_tag_title();
					elseif ( is_category() ) :
						single_cat_title();
					else :
						_e( 'Archives', 'teameight' );
					endif;
                ?><?php if ( ! is_tag() && ! is_category() ) { ?>
					<h2 class="ghead"><span><?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'teameight' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'teameight' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'teameight' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'teameight' ), get_the_date( _x( 'Y', 'yearly archives date format', 'teameight' ) ) );
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_category() ) :
							single_cat_title();
						else :
							_e( 'Archives', 'teameight' );
						endif;
					?></span></h2>
				<?php } //end if not tag and not cat ?></h1>
					</header>
					<?php 
                    	if ( is_tag() ) :
							echo '<div class="text">'.tag_description().'</div>';
						elseif ( is_category() ) :
							echo '<div class="text">'.category_description().'</div>';
						endif;
                    ?>
				</section>
			</article>
		<?php endif; ?>
	</section>
	<section class="section fullgrid cf cattags">
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'partials/threerow' ); ?>
		<?php endwhile; ?>
	</section>
<?php get_footer(); ?>