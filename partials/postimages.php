<?php
/**
 * Post images
 *
 * loops thru the ACF fields for post images
 *
 */
?>
<?php while(has_sub_field("images")): ?>
	<?php if(get_row_layout() == "image_only"): // layout: Image Only ?>
		<?php  
			$attachment_id = get_sub_field('image');
			$size = "full";
			$class = get_sub_field('image_class');
			
			teameight_images($attachment_id, $size, $class);
		?>
	<?php elseif(get_row_layout() == "image_and_text"): ?>
	<section class="imgdesc">
		<?php  
			$attachment_id = get_sub_field('image');
			$size = "full";
			$class = get_sub_field('image_class');
			 
			teameight_images($attachment_id, $size, $class);
		?>
		<div class="text">
			<?php the_sub_field('text'); ?>
		</div>
	</section>	
	<?php elseif(get_row_layout() == "section_header"): ?>
	<section class="sechead">
		<header>
			<h4 class="alt"><?php the_sub_field('section_title'); ?></h4>
			<h5 class="subheading"><?php the_sub_field('subtitle'); ?></h5>
		</header>
		<div class="text">
			<?php the_sub_field('intro_content'); ?>
		</div>
	</section>	
	<?php elseif(get_row_layout() == "text_only"): ?>
		<?php $class = get_sub_field('html_class'); ?>
	<section class="freeform <?php echo $class; ?>">
		<?php the_sub_field('text'); ?>
	</section>
	<?php elseif( get_row_layout() == "row2" || get_row_layout() == "row3" ): ?>
	<?php 
		$row = ( get_row_layout() == "row2" ? 2 : 3 ); 
		$imgsize = 'full';
	?>
	<section class="g g-<?php echo $row; ?>up cf">
		<div class="gi">
			<?php  
				$attachment_id = get_sub_field('image_1');
				$class = get_sub_field('image_1_class');
			 
				teameight_images($attachment_id, $size, $class);
			?>
		</div>
		<div class="gi">
			<?php  
				$attachment_id = get_sub_field('image_2');
				$class = get_sub_field('image_2_class');
			 
				teameight_images($attachment_id, $size, $class);
			?>
		</div>
		<?php if( $row == 3 ){ ?>
		<div class="gi">
			<?php  
				$attachment_id = get_sub_field('image_3');
				$class = get_sub_field('image_3_class');
			 
				teameight_images($attachment_id, $size, $class);
			?>
		</div>
		<?php } ?>
	</section>
	<?php endif; ?>
<?php endwhile; ?>