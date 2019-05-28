<?
  // Template Name: Landing Page
?>

<?php get_header()?>

<div class="interior flexible-content-page">
	<?php if(have_posts()) : while (have_posts()) : the_post();?>
		<article class="content" id="skiptomaincontent">
			<?php require 'inc/components/flexible-content.php'; ?>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
		</article>
	<?php endwhile; endif;?>
</div>

<?php get_footer()?>