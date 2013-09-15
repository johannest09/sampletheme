
<?php 

	print_r(get_the_category(), true);

?>

<section class="archive-dropdown">
    <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value=""><?php echo esc_attr( __( 'Veldu mánuð' ) ); ?></option> 								
		<?php wp_get_archives('format=option&cat=' .get_query_var('cat'). "'"); ?>

	</select>
</section>