
<?php if( class_exists('acf') ): ?>
<?php if( have_rows('page_sections') ): ?>
  <?php while ( have_rows('page_sections') ) : the_row(); ?>

    <?php if( get_row_layout() == 'jumplinks' ): ?>
      <?php require  __DIR__ . '/../partials/jumplinks.php'; ?>

      <?php elseif( get_row_layout() == 'feature' ): ?>
        <?php require  __DIR__ . '/../partials/feature.php'; ?>

    <?php elseif( get_row_layout() == 'basic_content' ): ?>
      <?php require  __DIR__ . '/../partials/basic.php'; ?>

    <?php elseif( get_row_layout() == 'bna' ): ?>
      <?php require  __DIR__ . '/../partials/bna.php'; ?>

    <?php elseif( get_row_layout() == 'multi_column' ): ?>
      <?php require  __DIR__ . '/../partials/multi-column.php'; ?>

    <?php elseif( get_row_layout() == 'split_section' ): ?>
      <?php require  __DIR__ . '/../partials/split-section.php'; ?>

    <?php elseif( get_row_layout() == 'testimonial' ): ?>
      <?php require  __DIR__ . '/../partials/testimonial.php'; ?>

    <?php elseif( get_row_layout() == 'contact_us' ): ?>
      <?php require  __DIR__ . '/../partials/contact.php'; ?>

      <?php elseif( get_row_layout() == 'breast_diagram' ): ?>
        <?php require  __DIR__ . '/../partials/breast-diagram.php'; ?>

		<?php endif; ?>
  <?php endwhile; ?>

  <?php else : ?>
    <section class="basic-content">
      <?php the_content(); ?>
    </section>
  <?php endif; ?>

<?php endif; ?>

