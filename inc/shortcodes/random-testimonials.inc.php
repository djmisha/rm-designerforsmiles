<?php
add_shortcode('randomtestimonials' , 'randomtestimonials');
function randomtestimonials( $atts , $content = null ){
	extract( shortcode_atts( array(
		'name'	=> '',

	), $atts , 'randomtestimonials' ) );
		ob_start();

	$rows = get_field('reviews' , 4 ); // get all the rows
	$rand_row = $rows[ array_rand( $rows ) ]; // get a random row

	$rand_row_review = $rand_row['review' ]; // get the sub field value 
	$rand_row_name = $rand_row['name' ]; // get the sub field value 
	$rand_row_image = $rand_row['image' ]; // get the sub field value 
	$rand_row_precedure_link = $rand_row['procedure' ]; // get the sub field value 
	$rand_row_precedure = $rand_row['procedure' ]; // get the sub field value 

?>


<div class="home-testis">
	<div class="home-reviews">
		<div class="the-review" style="background-image: url('<?php echo($rand_row_image); ?>');">
			<div class="the-testi">
				<?php echo($rand_row_review); ?>
				<span><?php echo($rand_row_name); ?></span>
			</div>
			<div class="the-proc">
				Procedures <a href="<?php echo($rand_row_precedure_link); ?>"><?php echo($rand_row_precedure); ?></a>
			</div>
		</div>
	</div>
</div>



		
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
