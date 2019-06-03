<?php
  $testimonial = get_sub_field('testimonial');
  $video = get_sub_field('video');
  $service = get_sub_field('service');
  $id = get_sub_field('id');
?>
<div class="flexible-testimonial onpage-reviews" id="<?php echo $id; ?>">
  <div class="flexibile-contain">
    <div class="flexible-testimonial-video"><?php echo $video; ?></div> 
    <div class="testimonial-group">
      <p><?php echo $testimonial; ?></p>
    </div>
  </div>
</div>