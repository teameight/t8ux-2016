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

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<?php if ( is_tag() || is_category() ) : ?>
			<div class="phead cf">
                <header class="article-header tcrd">
                    <div>
                        <h1><?php 
	                    	if ( is_tag() ) :
								single_tag_title();
							elseif ( is_category() ) :
								single_cat_title();
							else :
								_e( 'Archives', 'teameight' );
							endif;
	                    ?></h1>
                    </div>
                </header>
                <div class="pcont entry-content">
                    <div class="text">
                        <?php 
	                    	if ( is_tag() ) :
								echo tag_description();
							elseif ( is_category() ) :
								echo category_description();
							endif;
	                    ?>
                    </div>
                </div>
            </div>
			<?php endif; ?>
			<section class="section g g-3up cf">
				<?php if ( ! is_tag() && ! is_category() ) { ?>
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
				<?php } //end if not tag and not cat ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/threerow' ); ?>
				<?php endwhile; ?>
<!--			<a class="more" href="#">View More</a> -->
			</section>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>