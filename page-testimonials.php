<?
// Template Name: Testimonials 
?>

<?php get_header()?>

<section class="interior">
	<?php if(have_posts()) : while (have_posts()) : the_post();?>
		<article class="content" id="skiptomaincontent">
			<?php the_content(); ?>
			<div class="testi-container">
			<?php if(have_rows('testimonials_page')): ?>
				<?php while(have_rows('testimonials_page')): the_row(); ?>
					<div class="the-testi">
						<?php the_sub_field('testimonial'); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
		</article>
	<?php endwhile; endif;?>

	<?php get_sidebar()?>
</section>

<?php get_footer()?>


