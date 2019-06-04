<?php
	// Template Name: Home
?>

<?php get_header()?>


<div class="welcome-parallax will-parallax parallax-welcome b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/bg-welcome.jpg">
	<div class="welcome" id="skiptomaincontent">

		<div class="welcome-cta">
			<div class="bg-header-cruve-home-mobile"></div>
			<div class="welcome-logo">
			<h1><a href="<?php bloginfo('url'); ?>"><div> <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Designer Smiles"> </div></a></h1> </div>
			<h2><?php the_field('welcome_headline'); ?></h2>
			<?php the_field('welcome_content'); ?>
			<a href="<?php bloginfo('url'); ?>/contact-us/" class="button" rel="nofollow" rel="nofollow">Make an Appointment <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/icon-cal.png" alt="icon"></a>
			<a href="<?php the_field('gallery_button'); ?>" class="button" rel="nofollow" rel="nofollow">Smile Gallery <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/icon-photo.png" alt="icon"></a>
		</div>
	</div>
	<div class="bg-header-cruve-home"></div>
</div> 


<section class="home-aboutus b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/icon-dlogo.png">
	<h2><?php the_field('about_headline'); ?></h2>
	<div class="the-line"></div>
	<?php the_field('about_content'); ?>
</section>

<section class="home-doctor b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/bg-curves-red.jpg">
	<div class="doc-content">
		<img data-src="<?php bloginfo('template_directory'); ?>/images/img-doctors.png" alt="doctor" class="doc-image b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
		<div class="doc-quote">
			<?php the_field('doctor_cont'); ?>
		</div>
	</div>
	<div class="doc-buttons">
		<?php if(have_rows('doctor_buttons')): ?>
			<?php while(have_rows('doctor_buttons')): the_row(); ?>
				<a href="<?php the_sub_field('link'); ?>" rel="nofollow" class="button"><?php the_sub_field('name'); ?></a>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>	
</section>



<div class="home-featured-procedures b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/bg-curves-yellow.jpg">
	<?php if(have_rows('featured_procedures_1')): ?>
		<?php $count = 3; ?>
		<ul>
			<?php while(have_rows('featured_procedures_1')): the_row(); ?>
				<li style="background-image: url('<?php the_sub_field('image'); ?>');" class="wow fadeIn" data-wow-offset="20" data-wow-delay=".<?echo $count; ?>0s" data-wow-duration=".5s" >
					<div class="proced-name">
						<a href="<?php the_sub_field('procedure_link'); ?>">
							<span><?php the_sub_field('headline'); ?></span>
						</a>
					</div>
				</li>
				<?php $count++; ?>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<div class="bg-header-cruve-red-top"></div>
</div>


<div class="home-before-after">
	<h2><?php the_field('before_after_headline'); ?></h2>
	<?php if(have_rows('before_afters')): ?>
		<section class="the-slider owl-carousel">
			<?php while(have_rows('before_afters')): the_row(); ?>
				<div class="home-cases">
					<?php echo the_sub_field('shortcode'); ?>
				</div>
			<?php endwhile; ?>
		</section>
	<?php endif; ?>
	<section>
		<a href="<?php bloginfo('template_directory'); ?>/gallery/" class="button" rel="nofollow">View Our Smile Gallery</a>
	</section>
	<div class="bg-header-cruve"></div>
</div>

<?php get_footer()?>