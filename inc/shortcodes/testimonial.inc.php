<?php
add_shortcode('testimonial' , 'testimonial');
function testimonial( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'testimonial' ) );
		ob_start();

?>

<div class="full-width">
<section class="onpage-reviews">
	<div class="the-review-box">
	<div class="the-review">
		<?php the_field('testimonial_content'); ?>
		<div class="the-stars">
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
		</div>
		<div class="the-testi">
			<span><?php the_field('testimonial_name'); ?></span><i class="fas fa-user-alt"></i>
		</div>
	</div>
	</div>
</section>
</div>
		
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
