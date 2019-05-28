<?php get_header();?>


<main class="interior">

	<div class="gallery-content">
		<?php  echo rmg_archive_content(); ?>
	</div>
	
		<section class="gallery-cat-wrap">
			<?if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<?php
					$limit = 0;// could probably set this as an wp option
					foreach ($post->cases as $key => $value) {
						$case_link = $rmg_case::make_case_link(array('position' => $value['position'] , 'category_id' => $post->ID));
						$case_name = $rmg_case::make_case_name(array('position' => $value['position']));
						$case_content = $rmg_case::make_case_name(array('position' => $value['post_content']));

						$case_content = str_replace('Patient ', '', $case_content);


						echo '<div class="bna-group">';
						$i = 0;//required
						echo '<h2>'.  $case_name .'</h2>';

						echo '<div class="img-set">';
						foreach ($value['rmg_case_imgs'] as $img) {

							// if(!array_search('front', $img)){ continue; } // if the view_name does not equal 'front' then it will skip it till it finds one that does have that view_name


								if(!empty($img['before_image_path'])){
									echo '<a href="' . $case_link . '" class="before-link"><img class="before-img" src="'.$rmg_case::get_image($img['before_image_path'], 'medium') .'" alt=""><div class="bna-label">Before</div></a>';
								}

								if(!empty($img['after_image_path'])){
									echo '<a href="' . $case_link . '" class="after-link"><img class="after-img" src="'.$rmg_case::get_image($img['after_image_path'], 'medium') .'" alt=""><div class="bna-label">After</div></a>';
								}

								if($i == $limit) break; // if for whatever reason we have more than one front

								$i++;

						}//end of img loop

					// hover overlay

							echo '<div class="hover-overlay"><a href="' . $case_link . '"><i class="fal fa-search"></i></a></div>';

						echo '</div>';

					
					echo '</div>';
					}
					?>
			<?endwhile; endif;?>

	</section>

	
</main>

<?php get_footer();?>
