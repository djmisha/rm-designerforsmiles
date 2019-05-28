<?php get_header()?>

<section class="interior">
	<article class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<article class="post-snippet">
				<div class="excerpt">
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
						</div>
					<?php endif; ?>
					<h2 class="blog-title">
						<a href="<?the_permalink();?>">
							<?the_title();?>
						</a>
					</h2>
					<div class="meta-data"><?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> in <span><?php the_category(', '); ?></span></div>
					<span class="blog-split-line"></span>
					<div class="para">
						<a href="<?the_permalink();?>">
							<?php my_excerpt(60); ?> 
						</a>
					</div>
				</div>
			</article>
			<?endwhile; endif;?>
			<div class="blog-pagination">
				<?php mishas_happenstance_content_nav( '' ); ?>
			</div>
		</article>
		<?php get_sidebar()?>
	</section>
	<?php wp_reset_postdata(); ?>
	<?php get_footer()?>