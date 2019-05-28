<?php
add_shortcode('innovativesmile' , 'innovativesmile');
function innovativesmile( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'innovativesmile' ) );
		ob_start();

?>
		<div class="home-innovative will-parallax parallax-innvative full-width">
			<div><h2><span>Innovative</span>Sm;)es</h2></div>
			<?php if(have_rows('innovative_icons', 4)): ?>
				<ul>
					<?php while(have_rows('innovative_icons', 4)): the_row();
						$icon = get_sub_field('icon'); ?>
						<li class="<?php echo($icon); ?>">
							<a href="<?php the_sub_field('link'); ?>">
								<?php inline_svg($icon) ?>
								<span><?php the_sub_field('text'); ?></span>
								<span class="b-line"></span>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
