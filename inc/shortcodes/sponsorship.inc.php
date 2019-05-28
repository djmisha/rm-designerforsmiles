<?php  
add_shortcode('sponsorship' , 'sponsorship');
function sponsorship( $atts , $content = null ){
	extract( shortcode_atts( array(
		'attr'	=> '',

	), $atts , 'sponsorship' ) );
		ob_start();	
?>
	
	<div class="sponsorship-opportunities">
	<?php if(have_rows('sponsorship_opportunities')): ?>
		<ul>
			<?php while(have_rows('sponsorship_opportunities')): the_row(); ?>
				<li>
					<h2><?php the_sub_field('title'); ?></h2>
					<span>$<?php the_sub_field('price'); ?></span>
					<?php the_sub_field('content'); ?>
					<a data-src="#seaform-292" class="button-donate" data-fancybox href="javascript:;" >Sponsor Now</a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	</div>

<?
		
		$output = ob_get_contents();

		ob_end_clean();
	return $output;
}
