
<div class="flexible-breast-diagrams">
	
	<div class="home-breast-diagram">
		<div class="diagram-border">
			<h2><?php the_field('incision_headline', 3); ?></h2>
			<?php the_field('incision_content', 3); ?>
			<?php if(have_rows('incision_options', 3)): ?>
				<ul>
					<?php while(have_rows('incision_options', 3)): the_row(); ?>
						<li>
							<h3><?php the_sub_field('name', 3); ?><i class="fal fa-plus"></i><i class="fal fa-minus"></i></h3>
							<?php the_sub_field('content', 3); ?>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>



	<div class="home-implant-placement">
		<h2><?php the_field('implant_placement_headline', 3); ?></h2>
		<?php if(have_rows('implant_placement_options', 3)): ?>
			<ul>
				<?php while(have_rows('implant_placement_options', 3)): the_row(); ?>
					<li>
						<img src="<?php the_sub_field('image', 3); ?>" alt="diagram">
						<h3><?php the_sub_field('name', 3); ?></h3>
						<?php the_sub_field('content', 3); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
