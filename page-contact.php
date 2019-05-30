<?php
// Template Name: Contact
?>
<?php get_header()?>
<main class="interior">
<?php if(have_posts()) : while (have_posts()) : the_post();?>
	<article class="content">
		<div class="contact-content">
			<div class="contact-form">
				<h2>Email Us</h2>
				<?php the_content(); ?>
			</div>
			<div class="office-info">
				<h2>Location</h2>
				<?php if(have_rows('locations', 'option')): ?>
					<?php while(have_rows('locations', 'option')): the_row(); ?>

						<div class="the-address">
							<div class="map">
								<div class="gmaps">
									<?php the_sub_field('gmap_iframe', 'option'); ?>
								</div>
							</div>
							<div class="addy-hours">
								<div class="address">
									<strong><?php the_sub_field('name', 'option'); ?></strong><br>	
									<?php the_sub_field('address', 'option'); ?><br>
									<?php the_sub_field('city', 'option'); ?><br>
									<a href="<?php the_sub_field('map_link', 'option'); ?>" target="_blank" class="track-outbound" data-label="Address - Contact Page" rel="noopener">View Directions</a><br><br>
									
									Phone: <a href="<?php the_sub_field('phone_link','options'); ?>"  class="track-outbound" data-label="Phone - Contact Page"><?php the_sub_field('phone','options'); ?></a><br>
									<!-- Fax: <?php //the_sub_field('fax','options'); ?> -->
								</div>
							</div>
							<div class="the-hours"><br>
								<strong>Office Hours</strong>
								<div class="consult">
									<?php the_sub_field('hours', 'option'); ?>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</article>
		<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
	<?php endwhile; endif;?>
</main>
<?php get_footer()?>