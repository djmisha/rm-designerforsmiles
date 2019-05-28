  <?php
    $id = get_sub_field('id');
   ?>
   
  <section class="flexible-multicolumn" id="<?php echo $id; ?>">
    <?php if( have_rows('columns') ): ?>
      <?php while( have_rows('columns') ): the_row();
        $heading = get_sub_field('heading');
        $content = get_sub_field('content');
        $id = get_sub_field('id');
      ?>
      <div class="column-section" id="<?php echo $id; ?>">
        <?php if(!empty($heading) ): ?>
          <h2><?php echo $heading; ?></h2>
        <div class="page-title-line-custom"></div>       
        <?php endif; ?>
          <?php if( ($content) ) echo $content; ?>
      </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </section>