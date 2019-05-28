<?php
$id = get_sub_field('id');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$background = get_sub_field('background');
$text = get_sub_field('text');
?>

<section class="flexible-contact" id="<?php echo $id; ?>">
  <div class="contact-content">
   <h2><?php echo $heading; ?></h2>
   <?php echo $text; ?>
 </div>
</section>

