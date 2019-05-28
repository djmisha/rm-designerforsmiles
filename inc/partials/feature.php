  <?php
  	$hdng = get_sub_field('heading');
  	$bg = get_sub_field('background_image');
    $content = get_sub_field('content');
    $position = get_sub_field('text_position');
    $id = get_sub_field('id');
  ?>

    <section class="flexible-feature" id="<?php echo $id; ?>" style="background-image: url(<?php echo $bg; ?>)">
      <div class="featured-content" data-position="<?php echo $position; ?>">
      	<?php if( $hdng ) echo '<h2>'.$hdng.'</h2>'; ?>
        <div class="page-title-line-custom"></div>       
				<?php echo $content; ?>
      </div>
    </section>
