<?php get_header()?>

<section class="interior">
		<article class="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<h1><?php the_title(); ?></h1>
			<div class="meta-data">Posted on <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> <?php the_category(', '); ?></div>
			<?php the_content();?>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
			<div class="next-prev">
				<?php
				prevnext__modify( get_previous_post_link('%link', '&larr; Previous Post') ,
					$attributes = array(
						'class' => 'button prev-blog-button',
					));
					?>
					<?php
					prevnext__modify( get_next_post_link('%link', 'Next Post &rarr;') ,
						$attributes = array(
							'class' => 'button alignright next-blog-button',
						));
					?>
			</div>
		<?endwhile; endif;?>
		<?php get_sidebar()?>
		</article>
	</section>
<?php get_footer()?>