
<?php

	$bg = get_sub_field('background_icon');
	$content = get_sub_field('content');
	$heading = get_sub_field('heading');
	$id = get_sub_field('id');

?>

<section class="flexible-bna" id="<?php echo $id; ?>">

	<?php if( $heading ) echo '<h2>'.$heading.'</h2>'; ?>

	<?php if( have_rows('case') ): ?>
		<div class="cases">
			<?php while( have_rows('case') ): the_row();
				$category = get_sub_field('category');
				$patient = get_sub_field('patient');
				?>

				<?php echo do_shortcode( '[bnacasecustom category="' . $category . '" patient="' . $patient . '"  imageset="2" casecount="1" addtags="false" ]' ) ?>

			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<div class="more"><a href="<?php bloginfo('url'); ?>/gallery/" class="button" rel="nofollow">View Photo Gallery</a></div>

	<?php if ($content) echo '<div class="bna-content">' . $content . '</div>'; ?>

</section>