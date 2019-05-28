<?php
add_shortcode('contact_bar' , 'sc__contact_bar');
function sc__contact_bar( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'contact_bar' ) );
		ob_start();

?>
		<div class="contact_bar">
			<div class="schedule">Schedule Your Consulation</div>
			<div class="call">Call <a href="<?php the_field('phone_link', 'option'); ?> "><?php the_field('phone', 'option'); ?></a></div>
			<div class="or">or</div>
			<div><a href="#contact-form" class="button">Email Us</a></div>
		</div>
<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
}
