  <?php
    $headline = get_sub_field('heading');
    $menuname = get_sub_field('menu_name');
   ?>
  
  <section class="procedures-menu-section">
  	<h2><?php echo $headline; ?></h2>
  	<?php wp_nav_menu( array(
  		'menu' 		=> $menuname,
  		'container_class' => 'procedures-menu-wrap',
  		'menu_id'	=> 'menu-procedures',
  		'menu_class' => 'procedures-menu',
  		)); ?>
  </section>
