<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>


			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( !in_category('landing') ) : ?>
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
                    <?php endif; ?>
                    <?php if ( $image = get_field( 'splash_banner' ) ) : ?>
                        <header class="splash-banner">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </header>
                    <?php endif; ?>
                    <?php if ( in_category('landing') ) : ?>
                    <section class="discount-form">
                        <div class="wrap g-2up cf">
                            <div class="gi">
                                <?php the_field('offer_info'); ?>
                            </div>
                            <div class="gi">
                                <?php the_field('offer_form'); ?>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?>
                    <?php if( get_field('images') ||  get_field('video') ){ ?>
                        <?php if( get_field('video') ): ?>
                            <?php get_template_part( 'partials/video' ); ?>
                        <?php endif; ?>
                        <?php if( get_field('images') ): ?>
                            <?php get_template_part( 'partials/postimages' ); ?>
                        <?php endif; ?>
                    <?php } ?>
                    <section class="section cf next-page-cta">
                        <?php if ( in_category('landing') ) : ?>
                            <div class="cf">
                                <h5>See more of our <a href="<?php echo home_url('/#featured/'); ?>">work. <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
                            </div>
                        <?php else : ?>
                            <div class="cf">
                                <h5>Dig into our <a href="<?php echo home_url('/process/'); ?>">process. <svg class="cta-arrow"><use xlink:href="#arrow-icon"></use></svg></a></h5>
                            </div>
                        <?php endif; ?>
                    </section>
                </article><!-- #post -->
			<?php endwhile; ?>


<?php get_footer(); ?>