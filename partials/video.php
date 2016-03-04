<?php
/**
 * Post images
 *
 * loops thru the ACF fields for post images
 *
 */
?>
<?php $vid = get_field('video'); ?>
    <?php if(!empty($vid)): // layout: Video ?>
        <div class="videoWrapper">
        	<?php echo $vid; ?>
        </div>
<?php endif; ?>