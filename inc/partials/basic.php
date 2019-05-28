<?php
  $heading = get_sub_field('heading');
  $content = get_sub_field('content');
  $background = get_sub_field('background');
  $id = get_sub_field('id');
  $class = get_sub_field('class');
?>
  <section class="flexible-basic-content <?php echo $class; ?>" id="<?php echo $id; ?>" <?php if( $background ): ?> style="background-image: url(<?php echo $background; ?>);"<?php endif; ?>>
	<?php if( $heading ): ?> 
		<h2><?php echo $heading; ?></h2>
	<?php endif; ?>
    <?php echo $content; ?>
  </section>
