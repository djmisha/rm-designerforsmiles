<aside>

	<?php if(get_post_type() == 'post' ){ //Sidebar Blog Pages  ?>
		<div class="sidebar-block blog-block">
			<div class="sb-inside">
				<div class="sb-heading">Categories</div>
				<ul>
					<?php wp_list_categories( array(
						'title_li' 	=> '',
						'depth'		=> 1,
							// 'exclude'	=> 26
					) ); ?>
				</ul>

			</div>
		</div>
		<div class="sidebar-block blog-block">
			<div class="sb-inside">
				<div class="sb-heading">Archives</div>
				<ul class="list-items">
					<?php  wp_get_archives( array(
						'type'            => 'yearly',
						'limit'           => '',
						'before'          => '',
						'after'           => '',
						'show_post_count' => false,
						'echo'            => 1,
						'order'           => 'DESC'
					)); ?>
				</ul>

			</div>
		</div>
	<?php } ?>

	<?php if(!is_page(array('contact-us'))): //Sidebar Related Pages  ?>
		<?php if(!this_is('gallery-child' || 'gallery') && get_post_type() != 'post' && get_post_type() != 'news-room'):
			global $post;
			$related_id = ( $post->post_parent ) ? $post->post_parent : $post->ID;
			$childPages = wp_list_pages(array(
					'title_li'  	=> '',
					'child_of'  	=> $post->ID,
					'depth'   	=> 1,
					'echo'		=> 0
			));
			$wp__list_pages = wp_list_pages(array(
					'title_li'  	=> '',
					'child_of'  	=> $related_id,
					'exclude'		=> "$post->ID",
					'depth'   	=> 1,
					'echo'		=> 0
			));
			if(!empty($childPages)):
				$wp__list_pages = $childPages;
			endif;
			if( !empty($wp__list_pages) ): ?>
				
				<div class="related-pages full-width">
					<div class="the-headline">Related Pages</div>
					<div>
						<ul class="list-unstyled">
							<?php echo $wp__list_pages; ?>
						</ul>
					</div>
				</div>

			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>


</aside>