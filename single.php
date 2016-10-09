<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>


			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <section class="phead">
                        <header class="article-header tcrd">
                            <h1><?php the_title(); ?></h1>
                            <?php if( get_field('subtitle') ): ?>
                                <h5 class="subheading"><?php the_field('subtitle'); ?></h5>
                            <?php endif; ?>
                        </header>
                        <div class="pcont entry-content">
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </section>
                    <?php if( get_field('images') ||  get_field('video') ){ ?>
                        <?php if( get_field('video') ): ?>
                            <?php get_template_part( 'partials/video' ); ?>
                        <?php endif; ?>
                        <?php if( get_field('images') ): ?>
                            <?php get_template_part( 'partials/postimages' ); ?>
                        <?php endif; ?>
                    <?php } ?>
                    <section class="section cf next-page-cta">
                        <a class="anchor" name="start"></a>
                        <article class="cf">
                            <h5>Dig into our <a href="<?php echo home_url('/process/'); ?>">process. <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
                        </article>
                    </section>
                </article><!-- #post -->
			<?php endwhile; ?>


<?php get_footer(); ?>