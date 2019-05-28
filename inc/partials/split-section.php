
  <?php
    $headline = get_sub_field('headline');
    $image = get_sub_field('image');
    $content = get_sub_field('content');
    $id = get_sub_field('id');
  ?>


  <div class="flexible-split-section" id="<?php echo $id; ?>">
    <div data-src="<?php echo $image; ?>" class="with-bg b-lazy">
    </div>
    <div class="with-content">
      <h2><?php echo $headline; ?></h2> 
        <?php echo $content; ?>
    </div>
  </div>
