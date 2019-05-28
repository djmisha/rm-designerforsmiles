  <?php
    $heading = get_sub_field('headline');
    $id = get_sub_field('id');
  ?>

  <section class="flexible-media" id="<?php echo $id; ?>">
    <h2><?php echo $heading; ?></h2>
    <?php if( have_rows('media_repeater') ): ?>
        <ul>
      <?php while( have_rows('media_repeater') ): the_row();
        $video = get_sub_field('video');
        ?>
          <li>
            <?php if(!empty($video) ): ?>
              <?php if( ($video) ) echo $video; ?>
            <?php endif; ?>
          </li>
      <?php endwhile; ?>
        </ul>
    <?php endif; ?>
  </section>